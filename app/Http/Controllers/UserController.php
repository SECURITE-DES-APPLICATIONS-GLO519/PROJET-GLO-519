<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\administrateur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function welcome(){
        $user = Auth::user();
        // dd($user);
        if(!$user){
            return redirect()->route('auth.login');
        }
        else{
            if($user->role == 'BigBoss'){
                return redirect()->route('dashboard-bigboss');
            }
            else if($user->role == 'Admin')
            {
                return redirect()->route('admin.dashboard-admin');
            }
            else if($user->role == 'Etudiant'){
                return redirect()->route('etudiant.dashboard-etudiant');
            }
            else {
                return redirect()->route('dashboard-bigboss');
                // return redirect()->route('auth.login');
            }
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function dologin(LoginRequest $request){
        $credentials = $request->validated();
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            $name = $user->name;
            return redirect()->intended(route('home'));
        }
        return to_route('auth.login')->withErrors([
            'email'=>"login incorrect" 
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('auth.login'));
    }

    public function index(){
        $Listes =User::paginate(20);
        return view ('user.list',['Listes'=>$Listes]);
    }

    public function create(){
        $hidden = '';
        $table = new User();
        $user = Auth::user();
        return view('user.user-create',[
            'table'=>$table,
        ]);
    }

    public function create_user(UserRequest $request){
        $table = User::create($request->validated());
        $user = Auth::user();
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        return redirect()->route('user.create')->with('success',"Utilisateur Ajouter");
    }

    public function updateUser(User $table){
        return view('user.user-edit',[
            'table' => $table,
        ]);
    }

    public function update_user(UserRequest $request, User $table){
        $table->update($request->validated());
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        return redirect()->route('user.list')->with('success',"Enregistrement effectuer avec succes");
    }

    public function deleteUser(User $table){
        $table->delete();
        return redirect()->route('user.list')->with('success',"Utilisateur Suprimer");
    }
}
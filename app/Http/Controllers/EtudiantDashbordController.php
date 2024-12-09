<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEtudiantInformationRequest;
use App\Models\Demande;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EtudiantDashbordController extends Controller
{
    public function index(){
        return view('etudiant.dashboard');
    }


    public function show_information(){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        
        return view('etudiant.information.show',['table'=>$etudiant,'user'=>$user]);
    }
    public function add_information (Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $table = Etudiant::where('user_id','=',$user->id)->firstOrNew();

        return view('etudiant.information.add',['table'=>$table, 'user_id'=>$user_id]);
        // return Inertia::render('demande/test');
    }

    public function add_information_ (AddEtudiantInformationRequest $request){
        $user = Auth::user();
        $user_id = $user->id;
        $table = Etudiant::where('user_id','=',$user->id)->firstOrFail();
        // dd($table);
        if ($table->nom){
            $table->update($request->validated());
        }
        else{
            $table = Etudiant::create($request->validated());
        }
        return redirect()->route('etudiant.add_information',['table'=>$table]);
        // return Inertia::render('demande/test');
    }

    public function get_certificat(){
        $user = Auth::user();
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $demandes = Demande::where('etudiant_id','=',$etudiand->id)->paginate(20);

        return view('etudiant.certificat.list',['Listes'=>$demandes]);
    }


    public function add_certificat(){

        return '2';
    }


    public function add_certificat_(){

        return '6';
    }
}

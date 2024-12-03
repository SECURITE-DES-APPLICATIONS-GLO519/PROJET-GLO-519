<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreetudiantRequest;
use App\Http\Requests\UpdateetudiantRequest;
use App\Http\Requests\UserRequest;
use App\Models\etudiant;
use App\Models\User;
use App\Services\AuthServices;

class EtudiantController extends Controller
{

    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $Listes =User::where('role','=','Etudiant')
        ->leftJoin('etudiants','etudiants.user_id','=','users.id')
        ->select(
            'users.*',
            'etudiants.nom as nom',
        )
        ->paginate(20);
        // dd($Listes);
        return view ('etudiant.list',['Listes'=>$Listes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $table = new User();
        return view('etudiant.create',['table'=>$table]);
    }
    public function create_(UserRequest $userRequest)
    {
        $table = User::create($userRequest->validated());

        return redirect()->route('etudiant.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $table)
    {
        return view('etudiant.edit', ['table'=>$table]);
    }
    public function update_(User $table, UserRequest $userRequest)
    {
        $table = $table->update($userRequest->validated());
        return redirect()->route('etudiant.list');
    }
   
    public function delete(User $table){
        $table->delete();
        return redirect()->route('etudiant.list');
    }
}

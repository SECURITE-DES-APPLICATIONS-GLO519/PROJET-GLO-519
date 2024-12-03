<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrateurResquest;
use App\Http\Requests\StoreadministrateurRequest;
use App\Http\Requests\UpdateadministrateurRequest;
use App\Models\administrateur;
use App\Models\Departement;
use App\Models\User;
use App\Services\AuthServices;

class AdministrateurController extends Controller
{
    
    
    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = administrateur::paginate(20);
        return view('administrateur.list',['Listes'=>$table]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $table =  [
            'id' => '',
            'username'=>'',
            'nom' => '',
            'name' => '',
            'email' => '',
            'role' =>'',
            'service'=>'',
            'departement_id'=>'',
        ];
        $services = ['Scolarite', 'Bibliotheque', 'Departement', 'Direction'];
        $departement = new Departement();
        $table = (object) $table;
        $departements = Departement::all();
        return view('administrateur.create',['table'=>$table,'departement'=> $departement,'departements' => $departements,'services'=> $services]);
    }

    public function create_(AdministrateurResquest $request){
        $user = User::create($request->validated());
        // dd($user);
        $administrateur = administrateur::create([
            // $request->validated(),
            'service'=>$request->input('service'),
            'departement_id'=>$request->input('departement_id'),
            'nom'=>$request->input('nom'),
            'user_id'=> $user->id,
        ]);

        return redirect()->route('administrateur.list');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadministrateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(administrateur $administrateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(administrateur $administrateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(administrateur $administrateur)
    {
        // $table = administrateur::join('users','',=,)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrateur $administrateur)
    {
        //
    }
}

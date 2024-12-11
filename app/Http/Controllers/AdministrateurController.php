<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrateurResquest;
use App\Http\Requests\StoreadministrateurRequest;
use App\Http\Requests\UpdateadministrateurRequest;
use App\Models\administrateur;
use App\Models\Departement;
use App\Models\User;
use App\Services\AuthServices;
use Inertia\Inertia;

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
        // return Inertia::render('Administrateur/AdministrateurPage', [
        //     'administrateurs' => $table->items(),
        // ]);
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

    public function update(administrateur $table)
    {
         $table = administrateur::join('users','administrateurs.user_id','=','users.id')
                                ->select(
                                    'administrateurs.*',
                                    'administrateurs.id as id_a',
                                    'users.name as name',
                                    'users.email as email',
                                    )
                                ->where('administrateurs.id',"=",$table->id)
                                ->first();
        //  dd($table);
         $services = ['Scolarite', 'Bibliotheque', 'Departement', 'Direction'];
         $departement = Departement::find($table->departement_id);
        //  dd($departement);
         $table = (object) $table;
         $departements = Departement::all();
         return view('administrateur.create',['table'=>$table,'departement'=> $departement,'departements' => $departements,'services'=> $services]);
    }

    public function update_(AdministrateurResquest $administrateurResquest, administrateur $table){
        $user = User::find($table->user_id);
        $user = $user->update($administrateurResquest->validated());
        $administrateur = $table->update([
            // $request->validated(),
            'service'=>$administrateurResquest->input('service'),
            'departement_id'=>$administrateurResquest->input('departement_id'),
            'nom'=>$administrateurResquest->input('nom'),
        ]);
        return redirect()->route('administrateur.list');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(administrateur $table)
    {
        $user = User::findOrFail($table->user_id);
        $table->delete();
        if($user){
            $user->delete();
        }

        return redirect()->route('administrateur.list');
    }
}

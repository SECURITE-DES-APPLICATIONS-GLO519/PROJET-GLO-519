<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeadministrateur_demandeRequest;
use App\Http\Requests\Updateadministrateur_demandeRequest;
use App\Models\administrateur_demande;

class AdministrateurDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeadministrateur_demandeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(administrateur_demande $administrateur_demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(administrateur_demande $administrateur_demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateadministrateur_demandeRequest $request, administrateur_demande $administrateur_demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrateur_demande $administrateur_demande)
    {
        //
    }
}

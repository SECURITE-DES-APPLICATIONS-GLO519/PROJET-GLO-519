<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredemandeRequest;
use App\Http\Requests\UpdatedemandeRequest;
use App\Models\demande;
use App\Services\DemandeServices;

class DemandeController extends Controller
{
    protected $demandeServices;

    public function __construct(DemandeServices $demandeServices)
    {
        $this->demandeServices = $demandeServices;
    }
   
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
    public function store(StoredemandeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedemandeRequest $request, demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(demande $demande)
    {
        //
    }
}

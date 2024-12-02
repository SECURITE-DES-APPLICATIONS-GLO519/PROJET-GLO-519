<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreadministrateurRequest;
use App\Http\Requests\UpdateadministrateurRequest;
use App\Models\administrateur;
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
    public function update(UpdateadministrateurRequest $request, administrateur $administrateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrateur $administrateur)
    {
        //
    }
}

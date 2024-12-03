<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $table = Departement::paginate(20);
        return view('departement.list',['Listes'=>$table]);
    }

    public function create()
    {
        $table = new Departement();
        return view('departement.create',['table'=>$table]);
    }

    public function create_(DepartementRequest $request){
        $departement = Departement::create($request->validated());

        return redirect()->route('departement.list');
    }

    public function update(Departement $table){
        return view('departement.edit',['table'=>$table]);
    }

    public function update_(Departement $table, DepartementRequest $departementRequest){
        $table = $table->update($departementRequest->validated());
        return redirect()->route('departement.list');
    }

    public function delete(Departement $table){
        $table->delete();
        return redirect()->route('departement.list');
    }

}

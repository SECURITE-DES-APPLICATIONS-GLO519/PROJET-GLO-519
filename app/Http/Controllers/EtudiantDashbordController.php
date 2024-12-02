<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EtudiantDashbordController extends Controller
{
    public function add_information (Request $request){
        // return view('etudiant.add_information');
        // return Inertia::render('Components/auth/sign-in-form');
        return Inertia::render('demande/test');
    }

    public function index(){
        return view('dashboard');
    }
}

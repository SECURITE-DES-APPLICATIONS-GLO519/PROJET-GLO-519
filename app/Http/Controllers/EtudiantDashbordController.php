<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEtudiantInformationRequest;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EtudiantDashbordController extends Controller
{
    public function add_information (Request $request){
        $table = new Etudiant();
        $user = Auth::user();
        $user_id = $user->id;

        return view('etudiant.information.add',['table'=>$table, 'user_id'=>$user_id]);
        // return Inertia::render('demande/test');
    }

    public function add_information_ (AddEtudiantInformationRequest $request){
        $table = Etudiant::create($request->validated());
        return redirect()->route('etudiant.add_information',['table'=>$table]);
        // return Inertia::render('demande/test');
    }

    public function index(){
        return view('dashboard');
    }
}

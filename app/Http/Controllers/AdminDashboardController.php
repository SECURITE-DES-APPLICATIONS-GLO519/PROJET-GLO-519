<?php

namespace App\Http\Controllers;

use App\Models\administrateur as Administrateur;
use App\Models\Demande;
use App\Models\Etudiant;
use App\Services\DemandeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Http\Downloader;

class AdminDashboardController extends Controller
{
    private DemandeService $service;

    public function __construct(DemandeService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }
        $demandes = Demande::with('etudiant:id,nom,matricule')->paginate(20);
        return view('admin.accueil.list',['Listes'=>$demandes]);
    }


    public function show_demande(Demande $table){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }
        $etudiant = Etudiant::findOrNew($table->etudiant_id);
        $type = $table->type;
        $demande = Demande::where('id','=',$table->id)
                            ->with('quitus:url,niveau,annee')
                            ->with('relevers:url,niveau,annee')->firstOrNew();
        // dd($demande);
        // $url = $demande->quitus[0]->url;
        // dd("app\public\quitus\{$url}");
        // if(file_exists(storage_path("app\public\quitus\quitus-4428c6c474502e61151877825bb41961.jpg")) ){
        //     return  response()->download(storage_path("app\public\quitus/{$demande->quitus[0]->url}"));
        // }
        // dd($demande->quitus);
               
        return view('admin.certificat.show',['demande'=>$demande,'etudiant'=>$etudiant]);
    }

    public function valider_demande(Demande $table){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }

        $message = $this->service->valider_demande($table->id,$admin->id);

        return redirect()->route('admin.index')->with('success',$message);
    }
/////////////////////////////////////////////////////////////////////////////
//
//
//                          Certificat de scolarite
//
//
/////////////////////////////////////////////////////////////////////////////

    public function get_certificat(){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }
        if($admin->service == "Direction"){
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Demande de Certificat')
            ->paginate(20);
        }
        else{
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Impossible')
            ->paginate(20);
        }
        return view('admin.accueil.list',['Listes'=>$demandes]);
    }


/////////////////////////////////////////////////////////////////////////////
//
//
//                          Releve de note
//
//
/////////////////////////////////////////////////////////////////////////////

    public function get_releve(){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }
        if($admin->service == "Direction"){
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Demande de releve de note')
            ->paginate(20);
        }
        else{
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Impossible')
            ->paginate(20);
        }
        return view('admin.accueil.list',['Listes'=>$demandes]);
    }

/////////////////////////////////////////////////////////////////////////////
//
//
//                          Diplome
//
//
/////////////////////////////////////////////////////////////////////////////
    public function get_diplome(){
        $user = Auth::user();
        $admin = Administrateur::where('user_id','=',$user->id)->firstOrNew();
        if(!$admin->nom){
            return redirect()->route('auth.login');
        }
        if($admin->service == "Direction"){
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Demande de diplome')
            ->paginate(20);
        }
        else{
            $demandes = Demande::with('etudiant:id,nom,matricule')
            ->where('type','=','Impossible')
            ->paginate(20);
        }
        return view('admin.accueil.list',['Listes'=>$demandes]);
    }
}

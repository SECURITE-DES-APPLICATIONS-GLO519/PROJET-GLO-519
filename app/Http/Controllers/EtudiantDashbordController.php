<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEtudiantInformationRequest;
use App\Http\Requests\CertificatRequest;
use App\Http\Requests\DiplomeRequest;
use App\Models\Demande;
use App\Models\DemandeQuitus;
use App\Models\DemandeRelever;
use App\Models\Etudiant;
use App\Models\Quitu;
use App\Models\Relever;
use App\Services\DemandeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EtudiantDashbordController extends Controller
{
    private DemandeService $service;

    public function __construct(DemandeService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $user = Auth::user();
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $demandes = Demande::where('etudiant_id','=',$etudiand->id)->paginate(20);

        return view('etudiant.accueil.list',['Listes'=>$demandes]);
    }


    public function show_information(){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        
        return view('etudiant.information.show',['table'=>$etudiant,'user'=>$user]);
    }
    public function add_information (Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $table = Etudiant::where('user_id','=',$user->id)->firstOrNew();

        return view('etudiant.information.add',['table'=>$table, 'user_id'=>$user_id]);
        // return Inertia::render('demande/test');
    }

    public function add_information_ (AddEtudiantInformationRequest $request){
        $user = Auth::user();
        $user_id = $user->id;
        $table = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        // dd($table);
        if ($table->nom){
            $table->update($request->validated());
        }
        else{
            $table = Etudiant::create($request->validated());
        }
        return redirect()->route('etudiant.add_information')->with('success',"Message");
        // return Inertia::render('demande/test');
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
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $demandes = Demande::where('type','=','Demande de Certificat')
                            ->where('etudiant_id','=',$etudiand->id)->paginate(20);

        return view('etudiant.certificat.list',['Listes'=>$demandes]);
    }


    public function add_certificat(){
        $user = Auth::user();
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $response = $this->service->get_quitus_certificat($etudiand->id);
        $demande = new Demande();
        $quitus = $response['quitus'];
        return view('etudiant.certificat.add',['table'=>$demande, 'quitus'=>$quitus,'etudiant'=>$etudiand]);
    }
    public function add_certificat_(CertificatRequest $certificatRequest){
        $niveau = $certificatRequest->input('niveau');
        $annee = $certificatRequest->input('annee');
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        $data = $certificatRequest->file('url');
        $quitus = Quitu::create([
            'annee'=>$annee,
            'niveau'=>$niveau,
            'etudiant_id'=>$etudiant->id,
        ]);
        // dd($certificatRequest->all());

        if($data != null){
            // dd($data);
            $filePath = $data->store('quitus','public');
            $name = $_FILES['url']['name'];
            $extension = strrchr($name,".");
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "quitus-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/quitus/{$names}"));
            $quitus->url = $names;    
        }
        $quitus->save();
        $demande = Demande::create([
            'type'=>'Demande de Certificat',
            'statut'=>'ENVOYER',
            'etudiant_id'=>$etudiant->id
        ]);

        $demande_quitus = DemandeQuitus::create([
            'quitus_id'=>$quitus->id,
            'demande_id'=>$demande->id,
        ]);
        return redirect()->route('etudiant.certificat.list');
    }
    public function show_certificat(Demande $table){

        return view('etudiant.certificat.show',['demande'=>$table]);
    }

    public function annuler_certificat(Demande $table){
        $table->statut = 'ANNULER';
        $table->save();
        return redirect()->route('etudiant.certificat.list');
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
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $demandes = Demande::where('type','=','Demande de releve de note')
                            ->where('etudiant_id','=',$etudiand->id)->paginate(20);

        return view('etudiant.releve.list',['Listes'=>$demandes]);
    }


    public function add_releve(){
        $user = Auth::user();
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $response = $this->service->get_quitus_certificat($etudiand->id);
        $demande = new Demande();
        $quitus = $response['quitus'];
        return view('etudiant.releve.add',['table'=>$demande, 'quitus'=>$quitus,'etudiant'=>$etudiand]);
    }
    public function add_releve_(CertificatRequest $certificatRequest){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id','=',$user->id)->firstOrNew();

        $demande = Demande::create([
            'type'=>'Demande de releve de note',
            'statut'=>'ENVOYER',
            'etudiant_id'=>$etudiant->id
        ]);

        $data2 = $certificatRequest->file('url2');
        if($data2 != null){
            $niveau2 = $certificatRequest->input('niveau');
            $annee2 = $certificatRequest->input('annee');    
            $quitus = Quitu::create([
                'annee'=>$annee2,
                'niveau'=>$niveau2,
                'etudiant_id'=>$etudiant->id,
            ]);
            // dd($data);
            $filePath = $data2->store('quitus','public');
            $name = $_FILES['url2']['name'];
            $extension = strrchr($name,".");
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "quitus-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/quitus/{$names}"));
            $quitus->url = $names;   
            $quitus->save(); 
            $demande_quitus = DemandeQuitus::create([
                'quitus_id'=>$quitus->id,
                'demande_id'=>$demande->id,
            ]);
        }
        $data = $certificatRequest->file('url');
        if($data != null){
            $niveau = $certificatRequest->input('niveau');
            $annee = $certificatRequest->input('annee');    
            $quitus = Quitu::create([
                'annee'=>$annee,
                'niveau'=>$niveau,
                'etudiant_id'=>$etudiant->id,
            ]);
            // dd($data);
            $filePath = $data->store('quitus','public');
            $name = $_FILES['url']['name'];
            $extension = strrchr($name,".");
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "quitus-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/quitus/{$names}"));
            $quitus->url = $names;   
            $quitus->save(); 
            $demande_quitus = DemandeQuitus::create([
                'quitus_id'=>$quitus->id,
                'demande_id'=>$demande->id,
            ]);
        }
        return redirect()->route('etudiant.releve.list');
    }
    public function show_releve(Demande $table){

        return view('etudiant.releve.show',['demande'=>$table]);
    }

    public function annuler_releve(Demande $table){
        $table->statut = 'ANNULER';
        $table->save();
        return redirect()->route('etudiant.releve.list');
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
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $demandes = Demande::where('type','=','Demande de diplome')
                            ->where('etudiant_id','=',$etudiand->id)->paginate(20);

        return view('etudiant.diplome.list',['Listes'=>$demandes]);
    }


    public function add_diplome(){
        $user = Auth::user();
        $etudiand = Etudiant::where('user_id','=',$user->id)->firstOrNew();
        if(!$etudiand->nom){
            return redirect()->route('etudiant.add_information');
        }
        $response = $this->service->get_quitus_certificat($etudiand->id);
        $demande = new Demande();
        $quitus = $response['quitus'];
        return view('etudiant.diplome.add',['table'=>$demande, 'quitus'=>$quitus,'etudiant'=>$etudiand]);
    }
    public function add_diplome_(DiplomeRequest $request){
        $user = Auth::user();
        $etudiant = Etudiant::where('user_id','=',$user->id)->firstOrNew();

        $demande = Demande::create([
            'type'=>'Demande de diplome',
            'statut'=>'ENVOYER',
            'etudiant_id'=>$etudiant->id
        ]);
        for ($i=1; $i<6; $i++){
            $data = $request->file('url'.$i.'');

            if($data != null){
                $niveau = $request->input('niveau'.$i.'');
                $annee = $request->input('annee'.$i.'');    
                $relever = Relever::create([
                    'annee'=>$annee,
                    'niveau'=>$niveau,
                    'etudiant_id'=>$etudiant->id,
                ]);
                // dd($data);
                $filePath = $data->store('releve','public');
                $name = $_FILES['url'.$i.'']['name'];
                $extension = strrchr($name,".");
                $aleatoire = md5(substr('0123456789',rand(0,5)));
                $names = "releve-{$aleatoire}{$extension}";
                rename(storage_path("app/public/{$filePath}") , storage_path("app/public/releve/{$names}"));
                $relever->url = $names;   
                $relever->save(); 
                $demande_quitus = DemandeRelever::create([
                    'relever_id'=>$relever->id,
                    'demande_id'=>$demande->id,
                ]);
            }
        }
        return redirect()->route('etudiant.diplome.list');
    }


    public function show_diplome(Demande $table){

        return view('etudiant.diplome.show',['demande'=>$table]);
    }

    public function annuler_diplome(Demande $table){
        $table->statut = 'ANNULER';
        $table->save();
        return redirect()->route('etudiant.diplome.list');
    }
}

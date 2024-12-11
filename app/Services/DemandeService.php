<?php

namespace App\Services;

use App\Models\administrateur as Administrateur;
use App\Models\Demande;
use App\Models\Quitu;
use App\Models\Relever;
use Carbon\Carbon;

class DemandeService
{
    public function get_quitus_certificat( $etudiand_id){
        $quitusRecents = Quitu::where('etudiant_id','=',$etudiand_id)
                                ->where('annee', '>=', Carbon::now()->subMonths(9)->format('Y'))->firstOrNew();

        $response = [
            'quitus'=> $quitusRecents,
        ];
        // dd($response);
        return $response;
    }
    public function get_releve_diplome( $etudiand_id){
        $quitusRecents = Relever::where('etudiant_id','=',$etudiand_id)
                                ->where('annee', '>=', Carbon::now()->subMonths(9)->format('Y'))->firstOrNew();

        $response = [
            'quitus'=> $quitusRecents,
        ];
        // dd($response);
        return $response;
    }

    public function valider_demande($demande_id, $admin_id){
        $demande = Demande::find($demande_id);
        $admin = Administrateur::find($admin_id);

        if($admin->service == "Scolarite"){
            if($demande->type == "Demande de releve de note"){
                $demande->confirm_scolarite = True;
                $demande->save();  
                $message = "Reussi" ;
            }
            else{
                $message = "Pas d'autorisation";
            }
        }

        if($admin->service == "Bibliotheque"){
            if($demande->type == "Demande de releve de note"){
                $demande->confirm_bibliotheque = True;
                $demande->save();
                $message = "Reussi" ;
            }
            else{
                $message = "Pas d'autorisation";
            }
        }

        if($admin->service == "Departement"){
            if($demande->type == "Demande de releve de note"){
                $demande->confirm_departement = True;
                $demande->save();
                $message = "Reussi" ;
            }
            else{
                $message = "Pas d'autorisation";
            }

        }

        if($admin->service == "Direction"){
            if($demande->type == "Demande de Certificat"){
                $demande->confirm_departement = True;
                $demande->statut = "APROUVER";
                $demande->save();
                $message = "Reussi" ;
            }
            if($demande->type == "Demande de diplome"){
                $demande->confirm_departement = True;
                $demande->statut = "APROUVER";
                $demande->save();
                $message = "Reussi" ;
            }    
            if($demande->type == "Demande de releve de note"){
                if(($demande->confirm_scolarite ==True) && ($demande->confirm_bibliotheque ==True) && ($demande->confirm_departement==True) ){
                    $demande->confirm_departement = True;
                    $demande->statut = "APROUVER";
                    $demande->save();
                    $message = "Reussi" ;
                }
                else{
                    $message = "En attente d'autorisation des autres services";
                }    
            }
        }
        return $message;
    }
}
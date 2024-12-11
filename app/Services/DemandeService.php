<?php

namespace App\Services;

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
}
<?php
namespace App\Services;

use App\Interfaces\DemandeServicesInterface;
use App\Models\Demande;

class DemandeServices implements DemandeServicesInterface
{
    public function createDemande(array $data)
    {
        return Demande::create($data);
    }

    public function updateDemande(array $data, $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->update($data);
        return $demande;
    }

    public function deleteDemande($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->delete();
        return response()->json(['message' => 'Demande supprimée avec succès']);
    }

    public function getDemandeById($id)
    {
        return Demande::findOrFail($id);
    }

    public function listDemandesByUserId($userId)
    {
        return Demande::where('etudiant_id', $userId)->get();
    }

    public function listDemandes()
    {
        return Demande::all();
    }

    public function listDemandesByEtat(string $etat)
    {
        return Demande::where('statut', $etat)->get();
    }

    public function changeEtatDemande($id, string $etat)
    {
        $demande = Demande::findOrFail($id);
        $demande->statut = $etat;
        $demande->save();
        return $demande;
    }

    public function bulkDeleteDemandes(array $ids)
    {
        return Demande::whereIn('id', $ids)->delete();
    }

    public function bulkCreateDemandes(array $demandes)
    {
        $createdDemandes = [];
        foreach ($demandes as $data) {
            $createdDemandes[] = Demande::create($data);
        }
        return $createdDemandes;
    }
}

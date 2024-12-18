<?php

namespace App\Interfaces;

interface DemandeServicesInterface
{
    public function createDemande(array $data);
    public function updateDemande(array $data, $id);
    public function deleteDemande($id);
    public function getDemandeById($id);
    public function listDemandesByUserId($userId);
    public function listDemandes();
    public function listDemandesByEtat(string $etat);
    public function changeEtatDemande($id, string $etat);
    public function bulkCreateDemandes(array $demandes);
    public function bulkDeleteDemandes(array $ids);
}
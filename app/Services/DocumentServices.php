<?php
namespace App\Services;

use App\Interfaces\DocumentServicesInterfces;
use App\Models\Demande;
use App\Models\Document;

class DocumentServices implements DocumentServicesInterfces
{
    /**
     * Créer un document
     */
    public function createDocument(array $data)
    {
        // Créer un document à partir des données
        return Document::create([
            'url' => $data['url'],
            'type' => $data['type'],
            'demande_id' => $data['demande_id'], // Associer à une demande existante
        ]);
    }

    /**
     * Mettre à jour un document
     */
    public function updateDocument(array $data, $id)
    {
        $document = Document::findOrFail($id);

        // Mettre à jour les informations du document
        if (isset($data['url'])) {
            $document->url = $data['url'];
        }

        if (isset($data['type'])) {
            $document->type = $data['type'];
        }

        if (isset($data['demande_id'])) {
            $document->demande_id = $data['demande_id'];
        }

        // Sauvegarder les modifications
        $document->save();
        return $document;
    }

    /**
     * Supprimer un document
     */
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return response()->json(['message' => 'Document supprimé avec succès']);
    }

    /**
     * Obtenir un document par son ID
     */
    public function getDocumentById($id)
    {
        return Document::findOrFail($id);
    }

    /**
     * Obtenir les documents d'un utilisateur par son ID
     */
    public function getDocumentByUserId($userId)
    {
        return Document::whereHas('demande', function ($query) use ($userId) {
            $query->where('etudiant_id', $userId); // Associer aux demandes de l'utilisateur
        })->get();
    }

    /**
     * Obtenir les documents par l'ID de la demande
     */
    public function getDocumentByDemande($demandeId)
    {
        return Document::where('demande_id', $demandeId)->get();
    }

    /**
     * Lister tous les documents
     */
    public function listDocuments()
    {
        return Document::all();
    }
    public function bulkCreateDocuments(array $documents)
    {
        $createdDocuments = [];
        foreach ($documents as $data) {
            $createdDocuments[] = Document::create([
                'url' => $data['url'],
                'type' => $data['type'],
                'demande_id' => $data['demande_id'], // Associer chaque document à une demande
            ]);
        }

        return $createdDocuments;
    }
    public function bulkDeleteDocuments(array $ids)
    {
        Document::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Documents supprimés avec succès']);
    }


}
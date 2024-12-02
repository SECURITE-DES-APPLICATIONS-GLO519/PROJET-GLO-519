<?php

namespace App\Interfaces;

interface DocumentServicesInterfces{
    public function createDocument(array $data);
    public function updateDocument(array $data, $id);
    public function deleteDocument($id);
    public function getDocumentById($id);
    public function getDocumentByUserId($id);
    public function getDocumentByDemande($id);
    public function listDocuments();
    public function bulkCreateDocuments(array $documents);
    public function bulkDeleteDocuments(array $ids);
}
<?php
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\AuthServicesInterface;

class AuthServices implements AuthServicesInterface{

       /**
     * Authentifier un utilisateur
     */
    public function login(array $credentials)
    {
        $user = Utilisateur::where('nom_utilisateur', $credentials['nom_utilisateur'])->first();

        if ($user && Hash::check($credentials['motdepasse'], $user->motdepasse)) {
            return $user; // Retourne l'utilisateur authentifié
        }

        return null; // Échec
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function register(array $data)
    {
        $data['motdepasse'] = Hash::make($data['motdepasse']);
        return Utilisateur::create($data);
    }

    /**
     * Déconnexion
     */
    public function logout($user)
    {
        // Implémentez une logique de token ou session ici
        return true; // Simule une déconnexion réussie
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function updateUser(array $data, $id)
    {
        $user = Utilisateur::findOrFail($id);
        if (isset($data['motdepasse'])) {
            $data['motdepasse'] = Hash::make($data['motdepasse']);
        }
        $user->update($data);
        return $user;
    }

    /**
     * Supprimer un utilisateur
     */
    public function deleteUser($id)
    {
        $user = Utilisateur::findOrFail($id);
        return $user->delete();
    }
}
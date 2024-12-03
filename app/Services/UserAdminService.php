<?php

namespace App\Services;

use App\Models\User;
use App\Models\Administrateur;

class UserAdminService
{
    public function getUserAdminData($userId)
    {
        $user = User::with('administrateur')->find($userId);

        if ($user) {
            return [
                'id' => $user->id,
                'nom' => $user->nom,
                'email' => $user->email,
                'role' =>$user->role,
                'service'=>$user->administrateur->service,
                'departement'=>$user->administrateur->departement->nom,
                'niveau_acces' => $user->administrateur ? $user->administrateur->niveau_acces : null,
            ];
        }

        return null;
    }
}
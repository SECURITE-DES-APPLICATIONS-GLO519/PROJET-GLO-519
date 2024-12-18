<?php

namespace App\Interfaces;
interface AuthServicesInterface{
    public function login(array $credentials);
    public function register(array $data);
    public function logout($user);
    public function updateUser(array $data, $id);
    public function deleteUser($id); 
}
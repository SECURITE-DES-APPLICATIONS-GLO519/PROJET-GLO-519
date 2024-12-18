<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'Amoros',
            'email'=>'amoros@gmail.com',
            'role'=>'BigBoss',
            'password'=>Hash::make('amoros'),
        ]);
        User::create([
            'name'=>'Nouke lois',
            'email'=>'noukelois18@gmail.com',
            'password'=>Hash::make('amoros'),
        ]);

    }
}

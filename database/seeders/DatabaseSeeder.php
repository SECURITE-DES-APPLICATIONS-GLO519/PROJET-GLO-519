<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // DB::table('users')->delete();
        // User::create([
        //     'name'=>'Amoros',
        //     'email'=>'amoros@gmail.com',
        //     'role'=>'BigBoss',
        //     'password'=>Hash::make('amoros'),
        // ]);
        $this->call(DepartementSeeder::class);
    }
}

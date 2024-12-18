<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Exécuter le seeder.
     *
     * @return void
     */
    public function run()
    {
        // Créer 10 départements aléatoires
        Departement::factory()->count(10)->create();
        DB::table('users')->delete();
        Departement::create([
            'code'=>'INFOTEL',
            'nom'=>'Informatique et telecommunication',
            'description'=>'- -- - - - - - ',
        ]);
        Departement::create([
            'code'=>'GC',
            'nom'=>'Genie civile',
            'description'=>'- -- - - - - - ',
        ]);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('departement_etudiant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departement_id')->constrained()->onDelete('cascade'); // Clé étrangère vers departements
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade'); // Clé étrangère vers etudiants
            $table->timestamps(); // Pour garder un suivi de création et de mise à jour
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departement_etudiant');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("etudiant_id");
            $table->string("type");
            $table->string("statut");
            $table->unsignedBigInteger("departement_id")->nullable(true);
            $table->boolean("direction")->default(false);
            $table->boolean("departement")->default(false);
            $table->boolean("bibliotheque")->default(false);
            $table->boolean("scolarite")->default(false);
            $table->timestamps();

            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->foreign('departement_id')->references('id')->on('departements');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};

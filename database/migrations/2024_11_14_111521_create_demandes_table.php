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
            $table->enum("type",['Demande de Certificat','Demande de releve de note','Demande de diplome']);
            $table->enum("statut",['ENVOYER','TRAITEMENT','REFUSER','APROUVER','ANNULER']);
            $table->unsignedBigInteger("departement_id")->nullable();
            $table->boolean("confirm_direction")->default(false);
            $table->boolean("confirm_departement")->default(false);
            $table->boolean("confirm_bibliotheque")->default(false);
            $table->boolean("confirm_scolarite")->default(false);
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

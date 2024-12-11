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
        Schema::create('demande_quituses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id');
            $table->unsignedBigInteger('quitus_id');
            $table->timestamps();

            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->foreign('quitus_id')->references('id')->on('quitus');
            $table->unique(['quitus_id','demande_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_quituses');
    }
};

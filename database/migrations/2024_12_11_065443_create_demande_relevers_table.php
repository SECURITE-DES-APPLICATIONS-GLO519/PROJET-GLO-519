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
        Schema::create('demande_relevers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id');
            $table->unsignedBigInteger('relever_id');
            $table->timestamps();

            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->foreign('relever_id')->references('id')->on('relevers');
            $table->unique(['relever_id','demande_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_relevers');
    }
};

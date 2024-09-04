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
        Schema::create('credit_autos', function (Blueprint $table) {
            $table->id();
            $table->string('nbre_mois');
            $table->string('prix_apport');
            $table->string('prix_mois');
            $table->unsignedBigInteger('annonce_id');
            $table->foreign('annonce_id')->references('id')->on('annonces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_autos');
    }
};

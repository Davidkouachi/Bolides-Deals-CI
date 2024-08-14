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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('Quartier');
            $table->string('model');
            $table->string('transmission');
            $table->string('type_carburant');
            $table->string('nbre_place');
            $table->string('version');
            $table->string('couleur');
            $table->string('puiss_fiscal');
            $table->string('annee');
            $table->string('cylindre');
            $table->string('type_annonce');
            $table->string('prix');
            $table->string('immatriculation')->unique();
            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};

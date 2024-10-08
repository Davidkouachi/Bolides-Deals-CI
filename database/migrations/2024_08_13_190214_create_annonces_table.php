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
            $table->string('imm')->index();
            $table->integer('views')->default(0);
            $table->string('localisation');
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
            $table->string('neuf');
            $table->string('prix');
            $table->string('nbre_porte');
            $table->string('statut');
            $table->string('date_hors_ligne')->nullable();
            $table->string('refresh_date')->nullable();
            $table->integer('refresh_nbre')->default(0);
            $table->string('uuid')->unique()->index();
            $table->text('description');
            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->unsignedBigInteger('type_marque_id');
            $table->foreign('type_marque_id')->references('id')->on('type_marques');
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

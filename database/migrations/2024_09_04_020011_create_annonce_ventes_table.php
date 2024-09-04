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
        Schema::create('annonce_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('hors_taxe');
            $table->string('kilometrage');
            $table->string('nbre_cle');
            $table->string('visite_techn');
            $table->string('assurance');
            $table->string('papier');
            $table->string('troc');
            $table->string('credit_auto')->index();
            $table->string('negociable');
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
        Schema::dropIfExists('annonce_ventes');
    }
};

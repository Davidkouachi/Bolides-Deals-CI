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
        Schema::create('annonce_formules', function (Blueprint $table) {
            $table->id();
            $table->string('nbre_photo')->index();
            $table->string('duree_vie')->index();
            $table->string('nbre_refresh')->index();
            $table->string('tete_liste')->index();
            $table->string('top_annonce')->index();
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
        Schema::dropIfExists('annonce_formules');
    }
};

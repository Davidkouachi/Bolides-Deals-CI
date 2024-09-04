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
        Schema::create('formules', function (Blueprint $table) {
            $table->id();
            $table->string('nbre_photo')->index();
            $table->string('duree_vie')->index();
            $table->string('nbre_refresh')->index();
            $table->string('badge')->index();
            $table->string('tete_liste')->index();
            $table->string('top_annonce')->index();
            $table->string('stat')->index();
            $table->string('nom')->unique()->index();
            $table->string('couleur');
            $table->string('gratuit');
            $table->string('prix')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formules');
    }
};

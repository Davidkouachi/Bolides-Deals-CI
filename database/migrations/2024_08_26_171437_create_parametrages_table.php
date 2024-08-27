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
        Schema::create('parametrages', function (Blueprint $table) {
            $table->id();
            $table->integer('nbre_jours_ligne')->default(0);
            $table->integer('nbre_jours_delete')->default(0);
            $table->integer('nbre_refresh')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametrages');
    }
};

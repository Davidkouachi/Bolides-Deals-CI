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
            $table->integer('nbre_jours_ligne')->default(30);
            $table->integer('nbre_jours_delete')->default(5);
            $table->integer('nbre_refresh')->default(2);
            $table->integer('nbre_photo')->default(6);
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

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
        Schema::create('suggestion_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_nom')->unique();
            $table->string('file_chemin')->unique();
            $table->unsignedBigInteger('suggestion_id');
            $table->foreign('suggestion_id')->references('id')->on('suggestions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestion_files');
    }
};

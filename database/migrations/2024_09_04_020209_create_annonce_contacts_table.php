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
        Schema::create('annonce_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->nullable();
            $table->string('appel');
            $table->string('sms')->nullable();
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
        Schema::dropIfExists('annonce_contacts');
    }
};

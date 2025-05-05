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
        Schema::create('recherche_saq_codes', function (Blueprint $table) {
            $table->id();
            $table->json('recherche')->nullable(); // Colonne pour stocker les codes SAQ sous forme JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recherche_saq_codes');
    }
};

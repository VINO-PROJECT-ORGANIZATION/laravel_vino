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
        Schema::create('bouteille_has_celliers', function (Blueprint $table) {
            $table->foreignId('bouteille_id')->constrained('bouteilles')->onDelete('cascade');
            $table->foreignId('cellier_id')->constrained('celliers')->onDelete('cascade');
            $table->integer('quantite')->default(0);
            $table->boolean('favoris')->default(false);
            // Contrainte d’unicité pour éviter les doublons
            $table->primary(['bouteille_id', 'cellier_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bouteille_has_celliers');
    }
};

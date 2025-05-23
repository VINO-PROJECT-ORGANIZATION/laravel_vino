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
        Schema::create('bouteilles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('pays')->nullable();
            $table->string('format')->nullable();
            $table->string('url_image')->nullable();
            $table->decimal('prix_saq', 8, 2)->nullable(); // 999,999.99 max
            $table->string('code_saq')->unique();
            $table->string('degre_alcool')->nullable();
            $table->integer('note_saq')->nullable();
            $table->string('region')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bouteilles');
    }
};

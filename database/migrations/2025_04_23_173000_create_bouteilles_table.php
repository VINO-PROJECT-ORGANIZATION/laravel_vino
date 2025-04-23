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
            $table->string('nom');
            $table->string('image')->nullable(); // temporairement string, à remplacer par `image_id` plus tard.
            $table->string('code_saq')->unique();
            $table->string('pays')->nullable();
            $table->text('description')->nullable();
            $table->decimal('prix_saq', 8, 2)->nullable(); // 999,999.99 max
            $table->string('url_saq')->nullable();
            $table->string('url_image')->nullable();
            $table->string('format')->nullable();
            $table->string('type')->nullable(); // temporairement string, à remplacer par `type_id` plus tard.
            $table->boolean('bue')->default(false);
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
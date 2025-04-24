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
            $table->string('pays')->nullable();
            $table->string('code_saq')->unique();
            $table->decimal('prix_saq', 8, 2)->nullable(); // 999,999.99 max
            $table->string('url_image')->nullable();
            $table->string('format')->nullable();
            $table->string('type')->nullable(); // temporairement string, à remplacer par `type_id` plus tard.
            $table->integer('bue')->default(4)->nullable(); // 4 = non bue, 3 = 3/4, 2 = 2/4, 1 = 1/4, 0 = bue
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

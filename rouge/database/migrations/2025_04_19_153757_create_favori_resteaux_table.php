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
        Schema::create('favori_resteaux', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_touriste')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_resteau')->constrained('restaurants')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_favori_hotels');
    }
};

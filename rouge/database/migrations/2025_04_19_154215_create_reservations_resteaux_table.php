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
        Schema::create('reservations_resteaux', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
                $table->string('status');
                $table->foreignId('id_resteau')->constrained('restaurants')->onDelete('cascade');
                $table->foreignId('tourist_id')->constrained('users')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations_resteaux');
    }
};

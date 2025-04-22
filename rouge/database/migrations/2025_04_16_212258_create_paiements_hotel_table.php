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
        Schema::create('paiements_hotel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations_hotels')->onDelete('cascade');
            $table->foreignId('tourist_id')->constrained('users')->onDelete('cascade');
            $table->date('date_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement');
    }
};

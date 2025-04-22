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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_hotel');
            $table->text('description');
            $table->double('prix_nuit');
            $table->integer('nombre_chambre');
            $table->integer('nombre_salle_debain');
            $table->string('adress');
            $table->string('ville');
            $table->string('image');
            $table->date('disponibilite');
            $table->foreignId('hebergeur_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

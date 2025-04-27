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
        Schema::table('paiements_hotel', function (Blueprint $table) {
            $table->decimal('prix', 8, 2);
            $table->enum('status', ['attends', 'completer', 'anuler'])->default('attends');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements_hotel', function (Blueprint $table) {
            //
        });
    }
};

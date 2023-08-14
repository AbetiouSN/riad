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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('payment');
            $table->string('type_payment');
            $table->unsignedBigInteger('id_réservation')->nullable();
            $table->unsignedBigInteger('id_produit')->nullable();
            $table->foreign('id_produit')->references('id')->on('produit_vents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

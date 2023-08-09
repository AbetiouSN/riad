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
        Schema::create('produit_vents', function (Blueprint $table) {
            $table->id();
            $table->integer('quantité');
    $table->decimal('prix_produit');
    $table->decimal('prix_total');
    $table->decimal('somme_jour');
    $table->string('type_vent');
    $table->unsignedBigInteger('id_produit');
    $table->foreign('id_produit')->references('id')->on('produits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_vents');
    }
};

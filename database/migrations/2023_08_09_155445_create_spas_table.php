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
        Schema::create('spas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_réservation');
    $table->string('catégorie');
    $table->string('nom_soin');
    $table->decimal('dépense');
    $table->string('nom_réceptionniste');
    $table->decimal('prix');
    $table->decimal('somme');
    $table->unsignedBigInteger('id_client');
    $table->foreign('id_client')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spas');
    }
};

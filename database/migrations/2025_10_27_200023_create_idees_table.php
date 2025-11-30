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
        Schema::create('idees', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->text('description');
            $table->string('auteur_nom_complet');
            $table->string('auteur_email');
            $table->unsignedBigInteger('categorie_id');
            $table->enum('statut', ['en_attente', 'approuvée', 'refusée'])->default('en_attente');
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idees');
    }
};

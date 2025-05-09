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
        Schema::create('critique', function (Blueprint $table) {
            $table->id(); // ID primaire auto-incrémenté
            $table->unsignedBigInteger('user_id'); // Référence à l'utilisateur qui a écrit la critique
            $table->unsignedBigInteger('restaurant_id'); // Référence au restaurant concerné
            $table->text('content'); // Contenu de la critique
            $table->enum('status', ['Non modéré', 'Validé', 'Invalide'])->default('Non modéré'); // État de la critique
            $table->integer('rating')->nullable(); // Note donnée au restaurant (facultative)
            $table->timestamps(); // Colonnes created_at et updated_at

            // Définir les clés étrangères
            $table->foreign('user_id')->references('id')->on('utilisateur')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurant')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critique');
    }
};

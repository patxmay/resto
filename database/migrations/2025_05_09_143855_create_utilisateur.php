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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // Nom de l'utilisateur
            $table->string('email')->unique(); // Email unique
            $table->string('password'); // Mot de passe
            $table->string('address')->nullable(); // Adresse postale (rue, ville, code postal)
            $table->string('phone')->nullable(); // Numéro de téléphone
            $table->boolean('allow_contact')->default(false); // Accord pour être contacté par des restaurants
            $table->rememberToken(); // Jeton pour la fonctionnalité "Se souvenir de moi"

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};

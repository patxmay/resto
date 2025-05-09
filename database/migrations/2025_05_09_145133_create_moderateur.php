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
        Schema::create('moderateur', function (Blueprint $table) {
            $table->id(); // ID primaire auto-incrémenté
            $table->unsignedBigInteger('user_id'); // ID de l'utilisateur associé
            $table->timestamps();
            // Contrainte de clé étrangère pour lier un modérateur à un utilisateur
            $table->foreign('user_id')->references('id')->on('utilisateur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderateur');
    }
};

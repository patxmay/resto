<?php

use Illuminate\Support\Facades\Route;

/*
Routes publiques (accessibles aux visiteurs)
*/
use App\Http\Controllers\RestaurantController;

Route::get('/', [RestaurantController::class, 'search'])->name('restaurants.search'); // Page de recherche de restaurants
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show'); // Fiche d'un restaurant
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Formulaire d'inscription
Route::post('/register', [AuthController::class, 'register']); // Soumission du formulaire d'inscription
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Formulaire de connexion
Route::post('/login', [AuthController::class, 'login']); // Soumission du formulaire de connexion

/*
 Routes protégées (accessibles uniquement aux utilisateurs authentifiés)
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // Page du profil
    Route::post('/profile', [UserController::class, 'updateProfile']); // Mise à jour du profil

    // Critiques
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // Ajouter une critique
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit'); // Modifier une critique
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update'); // Enregistrer les modifications
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy'); // Supprimer une critique
});

/*
 Routes pour les modérateurs
 */

Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('/moderation', [ReviewController::class, 'moderation'])->name('reviews.moderation'); // Interface de modération
    Route::post('/moderation/{id}/validate', [ReviewController::class, 'validateReview'])->name('reviews.validate'); // Valider une critique
    Route::post('/moderation/{id}/invalidate', [ReviewController::class, 'invalidateReview'])->name('reviews.invalidate'); // Invalider une critique
});




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Liste des critiques non modérées pour les modérateurs
    public function moderation()
    {
        $reviews = Review::where('status', 'Non modéré')->get();
        return view('reviews.moderation', ['reviews' => $reviews]);
    }

    // Valider une critique
    public function validateReview($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['status' => 'Validé']);
        return back()->with('success', 'Critique validée.');
    }

    // Marquer une critique comme invalide
    public function invalidateReview($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['status' => 'Invalide']);
        return back()->with('success', 'Critique invalidée.');
    }
}
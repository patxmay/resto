<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    // Recherche de restaurants
    public function search(Request $request)
    {
        $query = Restaurant::query();

        if ($request->has('name')) {
            $query->where('name', 'like', $request->exact ? $request->name : '%' . $request->name . '%');
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->has('cuisine')) {
            $query->where('cuisine', $request->cuisine);
        }

        if ($request->has('rating_min') && $request->has('rating_max')) {
            $query->whereBetween('rating', [$request->rating_min, $request->rating_max]);
        }

        $restaurants = $query->get();

        return view('restaurants.search', ['restaurants' => $restaurants]);
    }

    // Afficher la fiche d'un restaurant
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.show', ['restaurant' => $restaurant]);
    }
}
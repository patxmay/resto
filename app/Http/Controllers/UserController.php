<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Profil utilisateur
    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', ['user' => $user]);
    }

    // Mise à jour du profil utilisateur
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update($request->only(['address', 'phone', 'allow_contact']));

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }
}
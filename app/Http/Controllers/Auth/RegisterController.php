<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        // Validazione dei dati, inclusa la foto profilo
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Caricamento della foto profilo
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // Creazione dell'utente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo' => $path,  // Salvataggio del percorso della foto
        ]);

        // Autenticazione dell'utente
        auth()->login($user);

        // Redirect alla homepage
        return redirect()->route('homepage');
    }
}


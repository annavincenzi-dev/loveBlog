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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'profile_photo' => 'nullable|image|max:2048',
        ],
        [
            'profile_photo.image' => 'File di tipo immagine richiesto.',
            'profile_photo.max' => 'Dimensione massima: 2MB.',
            'name.required' => 'Il campo Nome è obbligatorio.',
            'email.required' => 'Il campo Email è obbligatorio.',
            'email.email' => 'Formato email valido richiesto.',
            'email.unique' => 'Esiste già un utente registrato con questa email.',
            'password.required' => 'Il campo Password è obbligatorio.',
            'password.confirmed' => 'Le password non corrispondono.',
        ]);

        $path = null;

       
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_pictures', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo' => $path,  
        ]);

        
        auth()->login($user);

       
        return redirect()->route('homepage');
    }
}


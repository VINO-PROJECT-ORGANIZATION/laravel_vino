<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $pageCourante = 'register';
        return view('auth.register', compact('pageCourante'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'prenom' => ['required', 'string', 'max:255','min:3'],
            'date_naissance' => ['required', 'date'],
            'adresse' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'admin' => ['boolean'],
        ]
    ,
[
    'name.required' => 'Le nom est obligatoire.',
    'name.max' => 'Le nom ne doit pas depasser 255 caracteres.',
    'name.min' => 'Le nom doit avoir plus de 3 caracteres.',
    'prenom.min' => 'Le prenom doit avoir plus de 3 caracteres.',
     'prenom.required' => 'le prenom est obligatoire.',
    'prenom.max' => 'Le prenom ne doit pas depasser 255 caracteres',
     'adresse.required' => 'L\'addresse est obligatoire',
    'adresse.max' => 'L\'addresse ne doit pas depasser 255 caracteres',
    'password.required' => 'Le mot de passe est obligatoire.',
    'password.confirmed' => 'Le mot de passe requis ne correspond au mot de passe repete.',
]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'password' => Hash::make($request->password),
            'admin' => $request->admin ?? false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

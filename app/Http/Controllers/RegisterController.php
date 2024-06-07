<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:2',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|yahoo\.com|outlook\.com)$/'
            ],
            'password' => [
                'required',
                'min:5',
                'max:255',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/'
            ],
            'terms' => 'required'
        ], [
            'email.regex' => 'El correo electrónico debe ser de los dominios: @gmail.com, @hotmail.com, @yahoo.com o @outlook.com.',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, letras minúsculas y números.',
        ]);

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}
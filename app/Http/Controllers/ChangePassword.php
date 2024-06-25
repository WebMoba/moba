<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePassword extends Controller
{

    protected $user;

    public function __construct()
    {
        Auth::logout();

        $id = intval(request()->id);
        $this->user = User::find($id);
    }

    public function show()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {

        $messages = [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de caracteres.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña no debe tener más de :max caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula y un número, sin caracteres especiales ni espacios.',
            'confirm-password.same' => 'La confirmación de contraseña no coincide con la contraseña ingresada.'
        ];

        $attributes = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'string', 'min:7', 'max:15', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{7,15}$/'],
            'confirm-password' => ['same:password']
        ], $messages);

        $existingUser = User::where('email', $attributes['email'])->first();
        if ($existingUser) {
            $existingUser->update([
                'password' => $attributes['password']


            ]);
            return redirect('login');

        } else {
            return back()->with('error', 'Tu correo electrónico no coincide con el correo electrónico que solicitó el cambio de contraseña');

        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Notifications\ForgotPassword;

class ResetPassword extends Controller
{
    use Notifiable;

    public function show()
    {
        return view('auth.reset-password');
    }

    public function routeNotificationForMail()
    {
        return request()->email;
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->notify(new ForgotPassword($user->id));
            return back()->with('success', 'Se ha enviado un correo para que puedas recuperar tu contraseña.');
        }

        return back()->withErrors(['email' => 'No se ha encontrado ningún usuario con ese correo electrónico.']);
    }
}
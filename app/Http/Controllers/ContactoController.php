<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        // Lógica para enviar el correo electrónico
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');

        Mail::send('mobaMenu.contacto.index', ['nombre' => $nombre, 'email' => $email, 'mensaje' => $mensaje], function ($message) {
            $message->to('destinatario@example.com', 'Destinatario')->subject('Nuevo mensaje de contacto');
        });

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'El correo electrónico ha sido enviado correctamente.');
    }
}

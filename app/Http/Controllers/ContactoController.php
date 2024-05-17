<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // El usuario está autenticado, procesar el formulario
            // Lógica para enviar el correo electrónico

            $request->validate([
                'options' => 'required', // Asegura que al menos una opción haya sido seleccionada
            ]);

            
            $nombre = $request->input('nombre');
            $email = $request->input('email');
            $numeroId =$request->input('numeroId');
            $telefono = $request->input('telefono');
            $departamento = $request->input('departamento');
            $ciudad = $request->input('ciudad');
            $mensaje = $request->input('mensaje');

            Mail::send('mobaMenu.contacto.index', ['nombre' => $nombre, 'email' => $email, 'numeroId' => $numeroId,'telefono' => $telefono, 'departamento' => $departamento, 'ciudad' => $ciudad,'mensaje' => $mensaje], function ($message) {
                $message->to('destinatario@example.com', 'Destinatario')->subject('Nuevo mensaje de contacto');
            });

            return redirect()->back()->with('success', 'El correo electrónico ha sido enviado correctamente.');
        } else {
            // El usuario no está autenticado, mostrar un mensaje en una alerta y redirigir a la página de registro
            echo '<script>alert("Para enviar un mensaje, primero debes Inicar sesion o registrarte."); window.location.href = "'.route('login').'";</script>';
            exit;
        }
    }
}
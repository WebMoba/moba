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
            $numeroId = $request->input('numeroId');
            $telefono = $request->input('telefono');
            $departamento = $request->input('departamento');
            $ciudad = $request->input('ciudad');
            $mensaje = $request->input('mensaje');

            $contenidoCorreo = "
                Nombre: $nombre
                Email: $email
                Número Identificación: $numeroId
                Teléfono: $telefono
                Departamento: $departamento
                Ciudad: $ciudad
                Mensaje: $mensaje
            ";

            try {
                Mail::raw($contenidoCorreo, function ($message) {
                    $message->to('diegointernacional2017@gmail.com', 'Destinatario')->subject('Nuevo mensaje de contacto');
                });

                return redirect()->back()->with('success', 'El correo electrónico ha sido enviado correctamente.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'No se pudo enviar el correo electrónico. Por favor, inténtalo de nuevo más tarde.');
            }
        } else {
            // El usuario no está autenticado, mostrar un mensaje en una alerta y redirigir a la página de registro
            echo '<script>alert("Para enviar un mensaje, primero debes iniciar sesión o registrarte."); window.location.href = "'.route('login').'";</script>';
            exit;
        }
    }
}
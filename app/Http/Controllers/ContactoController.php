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
            // Validar los datos del formulario
            $request->validate([
                'options' => 'required', // Asegura que al menos una opción haya sido seleccionada
                'asunto' => 'required|string|max:255', // Validar el campo asunto
            ]);

            $nombre = $request->input('nombre');
            $email = $request->input('email');
            $asunto = $request->input('asunto'); // Obtener el asunto del formulario
            $tipoIdentificacion = $request->input('options');
            $numeroId = $request->input('numeroId');
            $telefono = $request->input('telefono');
            $departamento = $request->input('departamento');
            $ciudad = $request->input('ciudad');
            $mensaje = $request->input('mensaje');

            $contenidoCorreo = "
                Nombre: $nombre
                Email: $email
                Asunto: $asunto
                Tipo Identificación: $tipoIdentificacion
                Número Identificación: $numeroId
                Teléfono: $telefono
                Departamento: $departamento
                Ciudad: $ciudad
                Mensaje: $mensaje
            ";

            try {
                // Modifica el remitente y el destinatario aquí
                Mail::raw($contenidoCorreo, function ($message) use ($email, $asunto) { 
                    $message->from('agenciaMoba@gmail.com', 'Web Moba')
                            ->to('diegointernacional2017@gmail.com', 'Destinatario') // Cambia al correo deseado
                            ->subject($asunto); // Usar el asunto del formulario
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendConfirmationEmail($userEmail)
    {
        $data = ['message' => 'Gracias por registrarte!'];

        Mail::send('emails.confirmation', $data, function ($message) use ($userEmail) {
            $message->to($userEmail)
                    ->subject('Confirmación de Registro');
        });

        return 'Correo de confirmación enviado!';
    }
}

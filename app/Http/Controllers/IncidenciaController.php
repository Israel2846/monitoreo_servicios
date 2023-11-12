<?php

namespace App\Http\Controllers;

use App\Mail\IncidenciaMailable;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IncidenciaController extends Controller
{
    public function mailAviso()
    {
        $servicio = Servicio::first();

        Mail::to('isrel.k40@gmail.com')->send(new IncidenciaMailable($servicio));

        return 'Mensaje enviado con exito';
    }
}

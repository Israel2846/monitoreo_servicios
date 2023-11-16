<?php

namespace App\Http\Controllers;

use App\Mail\IncidenciaMailable;
use App\Models\Incidencia;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IncidenciaController extends Controller
{
    public function mail()
    {
        $servicio = Servicio::first();

        Mail::to(['isrel.k40@gmail.com', 'israaacolin@gmail.com'])->send(new IncidenciaMailable($servicio));

        return 'Mensaje enviado con exito';
    }

    public function store()
    {
        $incidencia = new Incidencia();

        $incidencia->fecha = now();

        $incidencia->save();

        $this->mail();
    }
}

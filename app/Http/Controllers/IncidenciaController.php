<?php

namespace App\Http\Controllers;

use App\Mail\IncidenciaMailable;
use App\Models\Incidencia;
use App\Models\Servicio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IncidenciaController extends Controller
{
    public function mail($id)
    {
        $servicio = Servicio::find($id);

        Mail::to(['isrel.k40@gmail.com', 'israaacolin@gmail.com'])->send(new IncidenciaMailable($servicio));

        return 'Mensaje enviado con exito';
    }

    public function store($id)
    {
        try {
            $servicio = Servicio::find($id);

            $servicio->activo = false;

            $incidencia = new Incidencia();

            $incidencia->fecha = now();
            $incidencia->servicio_id = $id;

            $incidencia->save();
            $servicio->save();

            $this->mail($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

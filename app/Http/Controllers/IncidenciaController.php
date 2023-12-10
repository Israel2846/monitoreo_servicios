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
    public function index()
    {
        // Consulta de todas las incidencias, ordenadas por fecha
        $incidencias = Incidencia::orderBy('fecha_inicio', 'desc')->paginate();

        // Retorno de vista con incidencias
        return view('incidencias.index', compact('incidencias'));
    }

    // Función para avisar por mail.
    public function mail($id)
    {
        $servicio = Servicio::find($id);

        Mail::to(['aux-sist-aifa1@cco.com.mx', 'aux-sist-aifa2@cco.com.mx'])->send(new IncidenciaMailable($servicio));

        return 'Mensaje enviado con exito';
    }

    // Función para crear incidencia
    public function store($id)
    {
        try {
            // Asignación de servicio según id
            $servicio = Servicio::find($id);

            // Cambio de estado de servicio a inactivo
            $servicio->activo = false;

            // Creación de nueva incidencia
            $incidencia = new Incidencia();

            $incidencia->fecha_inicio = now();
            $incidencia->servicio_id = $id;

            // Guardado de datos en modelos
            $incidencia->save();
            $servicio->save();

            // Se manda a llamar a la función para avisar por correo
            $this->mail($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Función para solucionar incidencia
    public function solution($id)
    {
        try {
            // Asignación de servicio según id
            $servicio = Servicio::find($id);

            // Cambio de estado de servicio a activo
            $servicio->activo = true;

            // Guardado de modelo
            $servicio->save();

            // Asignación de incidencia según el ultimo registro con el id
            $incidencia = Incidencia::where('servicio_id', $id)->latest()->first();

            // Conversión de fecha inicio en formato datetime
            $incidencia->fecha_inicio = \DateTime::createFromFormat('Y-m-d H:i:s', $incidencia->fecha_inicio);

            // Asignación de fecha de solución
            $incidencia->fecha_fin = now();

            // Calculo de tiempo de solución
            $incidencia->tiempo_solucion = $incidencia->fecha_inicio->diff($incidencia->fecha_fin)->format('%H:%I:%S');

            // Se guarda el objeto
            $incidencia->save();

            // Se manda a llamar a la función para avisar por correo
            $this->mail($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

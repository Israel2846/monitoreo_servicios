<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Exception;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class EstadoController extends Controller
{
    public function dashboard()
    {
        $servicios = Servicio::all();

        return view('estado_actual', compact('servicios'));
    }


    public function enviarPing()
    {
        $servicios = Servicio::all();

        $lista_servicios = [];

        foreach ($servicios as $servicio) {
            $ping = "ping $servicio->ip";

            $salida = shell_exec($ping);

            preg_match_all('/tiempo=(\d+)ms/', $salida, $matches);

            $tiemposRespuesta = isset($matches[1]) ? $matches[1] : [];

            $lista_servicios[] = [
                'id' => $servicio->id,
                'nombre' => $servicio->nombre,
                'tiempos' => $tiemposRespuesta,
                'activo' => $servicio->activo,
            ];
        }

        return response()->json($lista_servicios);
    }
}

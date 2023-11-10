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
        $servicio = Servicio::first();

        $ip = $servicio->ip;

        exec("ping $ip", $salida);

        $salida = array_map('utf8_encode', $salida);

        $tiemposRestpuesta = array_map(function ($line) {
            preg_match('/tiempo=(\d+)ms/', $line, $matches);
            return isset($matches[1]) ? $matches[1] : null;
        }, $salida);

        $tiemposRestpuesta = array_values(array_filter($tiemposRestpuesta));

        return response()->json([
            'nombre' => $servicio->nombre,
            'tiempos' => $tiemposRestpuesta,
        ]);
    }
}

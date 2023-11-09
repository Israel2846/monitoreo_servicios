<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class EstadoController extends Controller
{
    public function enviarPing()
    {
        $ip = '192.168.41.1';

        exec("ping $ip", $salida);

        $salida = array_map('utf8_encode', $salida);

        $tiemposRestpuesta = array_map(function ($line) {
            preg_match('/tiempo=(\d+)ms/', $line, $matches);
            return isset($matches[1]) ? $matches[1] : null;
        }, $salida);

        $tiemposRestpuesta = array_values(array_filter($tiemposRestpuesta));

        return response()->json($tiemposRestpuesta);
    }
}

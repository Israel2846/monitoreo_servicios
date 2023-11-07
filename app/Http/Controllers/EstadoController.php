<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function enviarPing()
    {
        $ip = '192.168.41.1';

        exec("ping $ip", $output);

        dd($output);
    }
}

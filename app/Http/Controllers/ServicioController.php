<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function show()
    {
        return view('servicios.index');
    }

    public function create()
    {
        return view('servicios.create');
    }
}
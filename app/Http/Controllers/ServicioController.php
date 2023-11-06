<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
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

    public function store(ServicioRequest $request)
    {
        return $request;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;

class Incidencia extends Model
{
    use HasFactory;

    /* Relación 1 a muchos inverso */
    public function servicios()
    {
        return $this->belongsTo(Servicio::class);
    }
}

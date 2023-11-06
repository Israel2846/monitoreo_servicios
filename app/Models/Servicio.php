<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incidencia;

class Servicio extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Relacion muchos a muchos */
    public function incidencias()
    {
        return $this->belongsToMany(Incidencia::class);
    }
}

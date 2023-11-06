<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Servicio extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Get y Set */
    public function nombre(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    public function ip(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    public function mac(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    /* Relacion muchos a muchos */
    public function incidencias()
    {
        return $this->belongsToMany(Incidencia::class);
    }
}

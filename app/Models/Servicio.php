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

    /* Relacion 1 a muchos */
    public function incidencia()
    {
        return $this->hasMany(Incidencia::class);
    }
}

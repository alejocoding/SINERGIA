<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    public $timestamps = false;
    public function genero()
    {
        return $this->belongsTo(genero::class);
    }

    public function departamento()
    {
        return $this->belongsTo(departamento::class);
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(tipos_documento::class, 'tipo_documento_id');
    }
    public function municipio()
    {
        return $this->belongsTo(municipios::class, 'municipio_id');
    }
}

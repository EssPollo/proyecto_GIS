<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'cliente_id',
        'tipo_proyecto_id',
        'residente_obra_empleado_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'ganancia_esperada',
        'control_presupuesto',
        'direccion',
        'estado_id',
    ];
/*
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function tipoProyecto()
    {
        return $this->belongsTo(TipoProyecto::class, 'tipo_proyecto_id', 'id');
    }
    public function residenteObra()
    {
        return $this->belongsTo(Empleado::class, 'residente_obra_empleado_id', 'id');
    }
    //relaciones uno a muchos un proyecto tiene muchas bitacoras
   /* public function bitacoras()
    {
        return $this->hasMany(Bitacora::class, 'proyecto_id', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }

*/
}
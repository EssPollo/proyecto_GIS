<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'proyecto_id',
        'tipo_bitacora_id',
    ];
    // Relación: una bitacora pertenece a un tipo de bitacora
    public function tipoBitacora()
    {
        return $this->belongsTo(TipoBitacora::class, 'tipo_bitacora_id', 'id');
    }

     // Relación: una bitacora pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id');
    }

    // Relación: una bitacora tiene muchos detalles de bitacora
   /* public function detallesTipoBitacora()
    {
        return $this->hasMany(DetallesBitacora::class, 'bitacora_id', 'id');
    }*/


}

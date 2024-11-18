<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBitacora extends Model
{
    protected $table = 'detalles_bitacora';
    use HasFactory;
    protected $fillable = [
        'observacion',
        'fecha',
        'bitacora_id',
        'usuario_id',
    ];

    //Relacion un detalle de bitacora pertenece a una bitacora
    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class, 'bitacora_id', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

}
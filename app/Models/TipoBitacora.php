<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBitacora extends Model
{
    protected $table = 'tipos_bitacoras';
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];


}

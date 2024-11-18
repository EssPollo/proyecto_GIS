<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable; 
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    //
    use Notifiable, HasRoles;

    // Definir la relación con Paciente 
    public function doctor() { 
        return $this->belongsTo(User::class, 'doctor_id'); 
    }

}

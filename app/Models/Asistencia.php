<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'user_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

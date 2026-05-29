<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','apellido','telefono','correo'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

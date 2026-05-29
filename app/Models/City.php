<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function states()
    {
        return $this->belongsTo(State::class); //esta tabla (City), tiene el id del otro
    }
}

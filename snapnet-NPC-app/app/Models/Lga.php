<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    protected $table = 'lgas';

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i a',strtotime($value));
    }
}
<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $table = 'citizens';

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i a',strtotime($value));
    }
}
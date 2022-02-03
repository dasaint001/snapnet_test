<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i a',strtotime($value));
    }
}
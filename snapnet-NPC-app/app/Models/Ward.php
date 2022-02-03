<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i a',strtotime($value));
    }
}
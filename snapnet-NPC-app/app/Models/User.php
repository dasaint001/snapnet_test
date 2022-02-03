<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    protected $hidden = ['password'];

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i a',strtotime($value));
    }
}

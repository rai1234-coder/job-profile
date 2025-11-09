<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
        protected $fillable = ['user_id', 'name'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

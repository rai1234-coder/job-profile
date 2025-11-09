<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name'];

        public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
{
    return $this->hasMany(Job::class);
}
}

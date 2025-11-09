<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{

        use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'user_id', // or 'employer_id' if that’s what you’re using
        'category_id',
        'type',
        'requirements',
        'company_name',
        'responsibilities',
    ];


    public function employer()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}

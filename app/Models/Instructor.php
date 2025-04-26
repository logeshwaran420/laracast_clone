<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Route;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'description'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function courses()
    {
        return $this->hasMany(Course::class,  'user_id');
    }

    
}

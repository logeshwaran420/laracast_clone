<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'description'];

    /**
     * Relationship: An instructor belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: An instructor can have multiple courses.
     */
    public function courses()
    {
        return $this->hasMany(Course::class,  'user_id');
    }




}

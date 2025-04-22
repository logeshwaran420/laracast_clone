<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'lesson_id', 'completed'];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relationship with the Lesson model
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    
    protected $table = 'enrollments';

    // If needed, you can define fillable fields for mass assignment
    protected $fillable = ['user_id', 'course_id'];
}

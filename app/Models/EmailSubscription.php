<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubscription extends Model
{
    use HasFactory;
    
    protected $table = 'email_subscriptions'; // Set the table name

    protected $fillable = ['email'];
}

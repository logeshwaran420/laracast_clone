<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // Define fillable attributes (for mass assignment)
    protected $fillable = [
        'name',
        'description',
        'duration_in_days',
    ];

    // Relationship with the Subscription model
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

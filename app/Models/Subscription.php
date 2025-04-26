<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Define fillable attributes (for mass assignment)
    protected $fillable = [
        'user_id',
        'plan_id',
        'starts_at',
        'ends_at',
        'is_active',
    ];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Plan model
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // Accessor for checking if the subscription is expired
    public function isExpired()
    {
        return $this->ends_at && $this->ends_at < now();
    }
}

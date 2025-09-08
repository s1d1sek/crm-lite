<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- Add this line

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * Get the orders for the customer.
     */
    public function orders(): HasMany // <-- Use HasMany here
    {
        return $this->hasMany(Order::class);
    }
}

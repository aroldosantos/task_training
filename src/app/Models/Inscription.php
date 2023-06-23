<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'classroom_id',
        'coffeebreak_id',
        'customer_id',
        'status'
    ];

    

    /**
     * Get the Curtomer associated with the inscription.
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    /**
     * Get the Classroom associated with the inscription.
     */
    public function classroom(): HasOne
    {
        return $this->hasOne(Classroom::class, 'id', 'classroom_id');
    }

    /**
     * Get the Coffeebreak associated with the inscription.
     */
    public function coffeebreak(): HasOne
    {
        return $this->hasOne(Coffeebreak::class, 'id', 'coffeebreak_id');
    }

}

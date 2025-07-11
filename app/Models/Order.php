<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'total_price',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}


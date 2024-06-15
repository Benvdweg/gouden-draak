<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'dish_id',
        'round_number',
        'comment',
        'reservation_id',
        'order_time',
    ];

    protected $casts = [
        'order_time' => 'datetime',
    ];

    public function order_lines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}

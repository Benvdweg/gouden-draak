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
        'reservation_id',
        'order_time',
        'email',
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

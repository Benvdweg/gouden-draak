<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'price', 'description', 'type_id', 'menu_number', 'addition_id'];

    public function scopeWithMenuOrAddition($query)
    {
        return $query->whereNotNull('menu_number')->orWhereNotNull('addition_id');
    }

    public function type()
    {
        return $this->belongsTo(DishType::class, 'type_id');
    }

    public function addition()
    {
        return $this->belongsTo(Addition::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'price', 'description', 'type_id'];

    public function type()
    {
        return $this->belongsTo(DishType::class, 'type_id');
    }
}

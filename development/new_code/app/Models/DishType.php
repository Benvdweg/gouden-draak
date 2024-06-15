<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class, 'type_id');
    }
}

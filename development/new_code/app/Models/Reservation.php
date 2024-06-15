<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $casts = [
        'starttime' => 'datetime',
        'endtime' => 'datetime',
    ];

    protected $fillable = [
        'starttime',
        'endtime',
        'table_number',
    ];
}

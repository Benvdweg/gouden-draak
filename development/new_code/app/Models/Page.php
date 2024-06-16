<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getRouteKeyName()
    {
        return $this->slug;
    }

    protected $fillable = [
        'slug',
        'title',
    ];
}

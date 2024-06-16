<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;

class Component extends Model
{
    use HasChildren;

    protected $fillable = [
        'type',
        'page_id',
        'arguments',
        'content',
        'order',
    ];

    public array $childTypes = [
        'text-component' => TextComponent::class,
    ];
}

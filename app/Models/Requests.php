<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'items',
        'requestors',
        'item_variants',
    ];

    protected $casts = [
        'items' => 'array',
        'requestors' => 'array',
        'item_variants' => 'array',
    ];
}

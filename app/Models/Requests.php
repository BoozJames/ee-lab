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
    ];

    protected $casts = [
        'items' => 'array',
        'requestors' => 'array',
    ];
}

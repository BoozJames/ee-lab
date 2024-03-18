<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'items',
        'requestors',
    ];

    protected $casts = [
        'items' => 'array',
        'requestors' => 'array',
    ];
}

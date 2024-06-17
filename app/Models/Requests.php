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
        'completed',
    ];

    protected $casts = [
        'items' => 'json',
        'requestors' => 'json',
    ];

    protected static function booted()
    {
        static::creating(function ($request) {
            $monthYear = date('mY');
            $lastRequestId = static::orderBy('id', 'desc')->value('id');
            $referenceNumber = $monthYear . '-' . str_pad($lastRequestId + 1, 4, '0', STR_PAD_LEFT);

            // Set the reference number for the current request
            $request->reference_number = $referenceNumber;
        });
    }
}

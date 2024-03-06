<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_code',
        'prefix_name',
        'first_name',
        'middle_name',
        'last_name',
        'extra_name',
        'college',
    ];
}

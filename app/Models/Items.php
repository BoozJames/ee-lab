<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'unit_id', 'category_id'];

    // public function unit()
    // {
    //     return $this->belongsTo(Units::class);
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Categories::class);
    // }

    public function itemVariants()
    {
        return $this->hasMany(ItemVariants::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemVariants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['item_id', 'item_variant_number', 'brand', 'variant_description', 'status', 'unit_id', 'category_id'];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }

    public function unit()
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}

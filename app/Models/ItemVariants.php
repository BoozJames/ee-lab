<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemVariants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['item_id', 'brand', 'variant_description', 'status', 'unit_id', 'category_id', 'equipment_label', 'serial_number', 'last_calibration_date' ];

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
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

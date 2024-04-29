<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReportItem extends Model
{
    use HasFactory;

    protected $table = 'reports_inventory_items';

    protected $fillable = [
        'id_reports_inventory',
        'item_id',
        'item_name',
        'item_description',
        'variant_id',
        'brand',
        'variant_description',
        'status',
        'unit',
        'category',
        'equipment_label',
        'serial_number',
        'last_calibration_date',
    ];

    public function report()
    {
        return $this->belongsTo(InventoryReport::class, 'id_reports_inventory');
    }
}

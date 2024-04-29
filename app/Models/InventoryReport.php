<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReport extends Model
{
    use HasFactory;

    protected $table = 'reports_inventory';

    protected $fillable = [
        'prepared_by',
        'date_prepared_by',
        'verified_by',
        'date_verified_by',
        'checked_by',
        'date_checked_by',
        'noted_by',
        'date_noted_by',
    ];

    public function items()
    {
        return $this->hasMany(InventoryReportItem::class, 'id_reports_inventory');
    }
}

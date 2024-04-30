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
        'prepared_by_designation',
        'date_prepared_by',
        'verified_by',
        'verified_by_designation',
        'date_verified_by',
        'checked_by',
        'checked_by_designation',
        'date_checked_by',
        'noted_by',
        'noted_by_designation',
        'date_noted_by',
    ];

    public function items()
    {
        return $this->hasMany(InventoryReportItem::class, 'id_reports_inventory');
    }
}

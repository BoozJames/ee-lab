<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'reports_maintenance';

    protected $fillable = [
        'year',
        'conducted_by',
        'verified_by',
        'category',
    ];

    public function items()
    {
        return $this->hasMany(ReportsMaintenanceItemsListing::class, 'maintenance_id', 'id');
    }
}

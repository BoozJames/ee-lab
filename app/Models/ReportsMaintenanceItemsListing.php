<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportsMaintenanceItemsListing extends Model
{
    protected $table = 'reports_maintenance_items_listing';
    protected $fillable = ['maintenance_id', 'item_id', 'variant_id', 'equipment_label', 'status', 'remarks', 'corrective_action'];
}
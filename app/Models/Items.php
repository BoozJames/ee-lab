<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Items extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'unit_id', 'category_id', 'image'];

    public function itemVariants()
    {
        return $this->hasMany(ItemVariants::class, 'item_id');
    }

    public function availableItemVariantsCount()
    {
        // Retrieve non-completed requests and parse item_variants field correctly
        $requestedVariantIds = Requests::where('completed', false)
            ->pluck('item_variants')
            ->flatten()
            ->map(function ($item) {
                return json_decode($item, true);
            })
            ->flatten()
            ->filter() // Remove null values
            ->toArray();

        Log::info('Requested Variant IDs:', $requestedVariantIds);

        // Get total count of variants for this item
        $totalVariantsCount = $this->itemVariants->count();

        // Count the number of requested variants for this item
        $requestedCount = collect($requestedVariantIds)->countBy()->get($this->id, 0);

        Log::info('Item ID: ' . $this->id);
        Log::info('Total Variants:', [$totalVariantsCount]);
        Log::info('Requested Count:', [$requestedCount]);

        // Calculate the available count
        $availableCount = $totalVariantsCount - $requestedCount;

        Log::info('Available Variants:', [$availableCount]);

        return $availableCount;
    }
}

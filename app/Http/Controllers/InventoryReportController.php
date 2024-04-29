<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemVariants;
use App\Models\InventoryReport;
use App\Models\InventoryReportItem;

class InventoryReportController extends Controller
{
    public function index()
    {
        $inventory = InventoryReport::all();
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        $items = ItemVariants::query()->get();
        return view('inventory.create', compact('items'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'prepared_by' => 'required',
            'verified_by' => 'required',
            'checked_by' => 'required',
            'noted_by' => 'required',
            'date_prepared_by' => 'required|date',
            'date_verified_by' => 'required|date',
            'date_checked_by' => 'required|date',
            'date_noted_by' => 'required|date',
            'item_id' => 'required|array',
            'item_id.*' => 'required|exists:item_variants,id',
            'item_name' => 'required|array',
            'item_name.*' => 'required|string',
            'variant_id' => 'required|array',
            'variant_id.*' => 'required|exists:item_variants,id',
            'brand' => 'required|array',
            'brand.*' => 'required|string',
            'unit' => 'required|array',
            'unit.*' => 'required|string',
            'category' => 'required|array',
            'category.*' => 'required|string',
            'equipment_label' => 'required|array',
            'equipment_label.*' => 'required|string',
            'serial_number' => 'required|array',
            'serial_number.*' => 'nullable|string',
            'status' => 'required|array',
            'status.*' => 'required|string',
            'last_calibration_date' => 'required|array',
            'last_calibration_date.*' => 'nullable|date',
        ]);

        // Create the inventory report
        $inventoryReport = InventoryReport::create([
            'prepared_by' => $validatedData['prepared_by'],
            'verified_by' => $validatedData['verified_by'],
            'checked_by' => $validatedData['checked_by'],
            'noted_by' => $validatedData['noted_by'],
            'date_prepared_by' => $validatedData['date_prepared_by'],
            'date_verified_by' => $validatedData['date_verified_by'],
            'date_checked_by' => $validatedData['date_checked_by'],
            'date_noted_by' => $validatedData['date_noted_by'],
        ]);

        // Create inventory report items
        foreach ($validatedData['item_id'] as $key => $itemId) {
            InventoryReportItem::create([
                'id_reports_inventory' => $inventoryReport->id, // Assigning the ID of the associated InventoryReport
                'item_id' => $itemId,
                'item_name' => $validatedData['item_name'][$key],
                'variant_id' => $validatedData['variant_id'][$key],
                'brand' => $validatedData['brand'][$key],
                'unit' => $validatedData['unit'][$key],
                'category' => $validatedData['category'][$key],
                'equipment_label' => $validatedData['equipment_label'][$key],
                'serial_number' => $validatedData['serial_number'][$key],
                'status' => $validatedData['status'][$key],
                'last_calibration_date' => $validatedData['last_calibration_date'][$key],
            ]);
        }
        

        return redirect()->route('inventory.index')->with('success', 'Inventory report created successfully.');
    }
}

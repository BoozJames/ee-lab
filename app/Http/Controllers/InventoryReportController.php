<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemVariants;
use App\Models\InventoryReport;
use App\Models\InventoryReportItem;
use Illuminate\Support\Facades\DB; // Add this line

class InventoryReportController extends Controller
{
    public function index()
    {
        $inventory = InventoryReport::orderBy('created_at', 'desc')->paginate(10);
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        $items = ItemVariants::where('status', '!=', 'Condemned')->paginate(20);
        return view('inventory.create', compact('items'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'prepared_by' => 'required',
            'verified_by' => 'required',
            'checked_by' => 'required',
            'noted_by' => 'required',
            'prepared_by_designation' => 'required',
            'verified_by_designation' => 'required',
            'checked_by_designation' => 'required',
            'noted_by_designation' => 'required',
            'date_prepared_by' => 'required|date',
            'date_verified_by' => 'required|date',
            'date_checked_by' => 'required|date',
            'date_noted_by' => 'required|date',
        ]);

        // Create the inventory report
        $inventoryReport = InventoryReport::create([
            'prepared_by' => $validatedData['prepared_by'],
            'verified_by' => $validatedData['verified_by'],
            'checked_by' => $validatedData['checked_by'],
            'noted_by' => $validatedData['noted_by'],
            'prepared_by_designation' => $validatedData['prepared_by_designation'],
            'verified_by_designation' => $validatedData['verified_by_designation'],
            'checked_by_designation' => $validatedData['checked_by_designation'],
            'noted_by_designation' => $validatedData['noted_by_designation'],
            'date_prepared_by' => $validatedData['date_prepared_by'],
            'date_verified_by' => $validatedData['date_verified_by'],
            'date_checked_by' => $validatedData['date_checked_by'],
            'date_noted_by' => $validatedData['date_noted_by'],
        ]);

        // Fetch data from the ItemVariants table and associate it with the newly created InventoryReport
        $itemVariants = ItemVariants::where('status', '!=', 'Condemned')->get();

        // Create inventory report items
        foreach ($itemVariants as $itemVariant) {
            InventoryReportItem::create([
                'id_reports_inventory' => $inventoryReport->id,
                'item_id' => $itemVariant->item_id,
                'item_name' => $itemVariant->item->name,
                'variant_id' => $itemVariant->id,
                'brand' => $itemVariant->brand,
                'unit' => $itemVariant->unit->name,
                'category' => $itemVariant->category->name,
                'equipment_label' => $itemVariant->equipment_label,
                'serial_number' => $itemVariant->serial_number,
                'status' => $itemVariant->status,
                'last_calibration_date' => $itemVariant->last_calibration_date,
            ]);
        }

        return redirect()->route('inventory.index')->with('success', 'Inventory report created successfully.');
    }

    public function show($id)
    {
        $inventoryReport = InventoryReport::findOrFail($id);
        $reportItems = $inventoryReport->items;
    
        // Get the previous report
        $previousReport = InventoryReport::where('created_at', '<', $inventoryReport->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
    
        $previousInventoryQuantities = [];
    
        // Calculate previous inventory quantities
        if ($previousReport) {
            $previousItems = $previousReport->items()->select('item_name', 'brand', DB::raw('COUNT(*) as total'))
                ->groupBy('item_name', 'brand')
                ->get();
    
            foreach ($previousItems as $item) {
                $previousInventoryQuantities[$item->item_name][$item->brand] = $item->total;
            }
        }
    
        return view('inventory.show', compact('inventoryReport', 'reportItems', 'previousInventoryQuantities'));
    }
    

    public function destroy($id)
    {
        // Find the inventory report by its ID
        $inventoryReport = InventoryReport::findOrFail($id);
        $inventoryReport->delete();

        // Delete associated inventory report items
        $inventoryReport->items()->delete();

        // Redirect back with a success message
        return redirect()->route('inventory.index')->with('success', 'Inventory report deleted successfully.');
    }
}


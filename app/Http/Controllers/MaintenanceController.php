<?php

namespace App\Http\Controllers;

// use Barryvdh\Dompdf\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Maintenance;
use App\Models\ReportsMaintenanceItemsListing;
use App\Models\Categories;
use App\Models\ItemVariants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function index()
    {
        // Logic to fetch all resources
        $maintenance = Maintenance::all();
        return view('maintenance.index', compact('maintenance'));
    }

    public function create()
    {
        $maintenance = Maintenance::all();
        $categories = Categories::all();
        return view('maintenance.create', compact('maintenance', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'conducted_by' => 'required|string|max:255',
            'verified_by' => 'required|string|max:255',
            'year' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            // Add validation rules for item variants here
            'equipment_label.*' => 'required|string|max:255',
            'status.*' => 'required|string|in:Newly Acquired,Functional,Non-Functional,For Condemn,Defective,Obsolete',
            'remarks.*' => 'nullable|string|max:255',
            'corrective_action.*' => 'nullable|string|max:255',
        ]);
    
        // Create a new maintenance report
        $report = new Maintenance();
        $report->conducted_by = $request->conducted_by;
        $report->verified_by = $request->verified_by;
        $report->year = $request->year;
        
        // Find the category by ID and associate it
        $category = Categories::findOrFail($request->category_id);
        $report->category = $category->name;
        $report->save();
    
        // Get the ID of the saved maintenance report
        $maintenanceId = $report->id;
    
        // Attach item variants to the maintenance report
        foreach ($request->equipment_label as $key => $equipmentLabel) {
            $itemVariant = new ReportsMaintenanceItemsListing();
            $itemVariant->maintenance_id = $maintenanceId; // Use the obtained maintenance ID here
            $itemVariant->item_id = $request->item_id[$key];
            $itemVariant->variant_id = $request->variant_id[$key];
            $itemVariant->equipment_label = $equipmentLabel;
            $itemVariant->status = $request->status[$key];
            $itemVariant->remarks = $request->remarks[$key] ?? null;
            $itemVariant->corrective_action = $request->corrective_action[$key] ?? null;
            $itemVariant->save();
        }
    
        return redirect()->route('maintenance.index')->with('success', 'Maintenance report created successfully.');
    }

    public function show($id)
    {
        // Retrieve the maintenance report with its related items
        $maintenance = Maintenance::with('items')->findOrFail($id);
        // Pass the data to the view
        return view('maintenance.show', compact('maintenance'));
    }

    public function edit($id)
    {
        // Logic to show edit resource form
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific resource
    }

    public function destroy($id)
    {
        $maintenanceReport = Maintenance::find($id);
    
        if (!$maintenanceReport) {
            return redirect()->route('maintenance.index')->with('error', 'Maintenance report not found.');
        }
    
        $maintenanceReport->delete();
    
        // Also delete associated maintenance items listings
        ReportsMaintenanceItemsListing::where('maintenance_id', $id)->delete();
    
        return redirect()->route('maintenance.index')->with('success', 'Maintenance report deleted successfully.');
    }

    public function getvariant($id)
    {
        $itemVariants = ItemVariants::where('category_id', $id)->get();
        return response()->json($itemVariants);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ItemVariants;
use App\Models\Items;
use App\Models\Units;
use App\Models\Categories;
use Illuminate\Http\Request;

class ItemVariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $variantQuery = ItemVariants::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $variantQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }

        $variants = $variantQuery->paginate(10);
        $units = Units::all();
        $categories = Categories::all();

        return view('variants.index', compact('variants', 'units', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Items::all();
        $units = Units::all();
        $categories = Categories::all();

        return view('variants.create', compact('units', 'categories', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id' => 'required',
            'brand' => 'required|string|max:50',
            'variant_description' => 'required|string|max:255',
            'status' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'equipment_label' => 'string|max:255',
            'serial_number' => 'string|max:255',
            'last_calibration_date' => 'nullable|date', 
            // Add more validation rules as needed
        ]);

        $variant = ItemVariants::create($validatedData);

        return redirect()->route('variants.index')->with('success', 'Variant created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $variant = ItemVariants::findOrFail($id);
        $items = Items::all();
        $units = Units::all();
        $categories = Categories::all();
        return view('variants.show', compact('variant', 'items', 'units', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $variant = ItemVariants::findOrFail($id);
        $items = Items::all();
        $units = Units::all();
        $categories = Categories::all();

        return view('variants.edit', compact('variant', 'items', 'units', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_id' => 'required',
            'brand' => 'required|string|max:50',
            'variant_description' => 'required|string|max:255',
            'status' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'equipment_label' => 'string|max:255',
            'serial_number' => 'string|max:255',
            'last_calibration_date' => 'nullable|date', 
            // Add more validation rules as needed
        ]);

        try {
            $variant = ItemVariants::findOrFail($id);
            $variant->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('variants.edit', $id)->withInput()->withErrors(['error' => 'Error updating data. Please try again.']);
        }

        return redirect()->route('variants.index')->with('success', 'Variant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ItemVariants::findOrFail($id);
        $variant->delete();

        return redirect()->route('variants.index')->with('success', 'Variant deleted successfully.');
    }
}

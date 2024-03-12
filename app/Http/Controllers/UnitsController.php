<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unitsQuery = Units::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $unitsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            });
        }
        $units = $unitsQuery->paginate(10);

        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        try {
            $unit = Units::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('units.create')->withInput()->withErrors(['error' => 'Error saving data. Please try again.']);
        }
    
        return redirect()->route('units.index')->with('success', 'Unit added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Units $unit)
    {
        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Units::findOrFail($id);
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        try {
            $unit = Units::findOrFail($id);
            $unit->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('units.edit', $id)->withInput()->withErrors(['error' => 'Error updating data. Please try again.']);
        }

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Units::findOrFail($id);
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}

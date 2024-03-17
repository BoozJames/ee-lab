<?php

namespace App\Http\Controllers;

use App\Models\Faculties;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $facultiesQuery = Faculties::query();

    if ($request->filled('search')) {
        $search = $request->input('search');
        $facultiesQuery->where(function ($query) use ($search) {
            $query->where('emp_code', 'like', "%$search%")
                ->orWhere('prefix_name', 'like', "%$search%")
                ->orWhere('first_name', 'like', "%$search%")
                ->orWhere('middle_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('extra_name', 'like', "%$search%")
                ->orWhere('college', 'like', "%$search%");
        });
    }
    $faculties = $facultiesQuery->paginate(10);

    return view('faculties.index', compact('faculties'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'emp_code' => 'required|string|max:10',
            'prefix_name' => 'required|string|max:10',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'extra_name' => 'string|max:10',
            'college' => 'required|string|max:100',
            // Add more validation rules as needed
        ]);

        try {
            $faculty = Faculties::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('faculties.create')->withInput()->withErrors(['error' => 'Error saving data. Please try again.']);
        }
    
        return redirect()->route('faculties.index')->with('success', 'Faculty added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Faculties $faculty)
    {
        return view('faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faculty = Faculties::findOrFail($id);
        return view('faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'emp_code' => 'required|string|max:10',
            'prefix_name' => 'nullable|string|max:10',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'extra_name' => 'nullable|string|max:10',
            'college' => 'required|string|max:100',
            // Add more validation rules as needed
        ]);

        try {
            $faculty = Faculties::findOrFail($id);
            $faculty->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('faculties.edit', $id)->withInput()->withErrors(['error' => 'Error updating data. Please try again.']);
        }

        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculties::findOrFail($id);
        $faculty->delete();

        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}

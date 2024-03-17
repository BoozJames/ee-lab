<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoriesQuery = Categories::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $categoriesQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            });
        }
        $categories = $categoriesQuery->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
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
            $category = Categories::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('categories.create')->withInput()->withErrors(['error' => 'Error saving data. Please try again.']);
        }
    
        return redirect()->route('categories.index')->with('success', 'Categpry added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('categories.edit', compact('category'));
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
            $category = Categories::findOrFail($id);
            $category->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('categories.edit', $id)->withInput()->withErrors(['error' => 'Error updating data. Please try again.']);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

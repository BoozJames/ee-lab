<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemQuery = Items::query();

        // if ($request->filled('role')) {
        //     $itemQuery->where('role', $request->role);
        // }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $itemQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }
        $items = $itemQuery->paginate(5);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            // Add more validation rules as needed
        ]);


        $items = Items::create($validatedData);

        return redirect()->route('items.index')->with('success', 'Itemscreated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Items::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Check if the file upload was successful
            if (!$image->isValid()) {
                // Handle the upload error
                return redirect()->back()->withErrors(['image' => 'File upload failed.'])->withInput();
            }
    
            $imagePath = $image->store('public/images/items');
            $validatedData['image'] = $imagePath;
        }
    
        $items = Items::create($validatedData);
    
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Items::findOrFail($id);
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Items::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $item = Items::findOrFail($id);
    
            // Check if the request has an image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($item->image) {
                    Storage::delete($item->image);
                }
    
                // Store the new image
                $imagePath = $request->file('image')->store('public/images/items');
                $validatedData['image'] = $imagePath;
            }
    
            $item->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('items.edit', $id)->withInput()->withErrors(['error' => 'Error updating data. Please try again.']);
        }
    
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
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

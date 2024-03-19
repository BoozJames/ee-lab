<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrainerController extends Controller
{
    /**
     * Display a listing of the trainers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new trainer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Items::orderBy('name', 'asc')->get();
        return view('trainers.create', compact('items'));
    }

    /**
     * Store a newly created trainer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'trainer_name' => 'required|string|max:255',
            'array_item_ids' => 'required|string',
            'array_qty' => 'required|string',
        ]);

        // Create a new Trainer instance
        $trainer = new Trainer();

        // Assign values to the Trainer instance
        $trainer->trainer_name = $request->input('trainer_name');
        $trainer->array_item_ids = explode(',', $request->input('array_item_ids'));
        $trainer->array_qty = explode(',', $request->input('array_qty'));

        // Save the Trainer instance
        $trainer->save();

        // Redirect back or return a response as needed
        // For example, you can redirect back to the index page
        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    public function edit($id)
    {
        // $trainer = Trainer::with('items')->find($id);
        $trainer = Trainer::findOrFail($id);
        $items = Items::orderBy('name')->get();
        return view('trainers.edit', compact('trainer', 'items'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'trainer_name' => 'required|string|max:255',
            'selected_items' => 'required|array',
            'quantities' => 'required|array',
        ]);

        // Convert array values to comma-separated strings
        $array_item_ids = implode(',', $validatedData['selected_items']);
        $array_qty = implode(',', $validatedData['quantities']);

        // format the array to ["n", "m"]
        $array_item_ids = explode(',', $array_item_ids);
        $array_qty = explode(',', $array_qty);
    
        // Find the Trainer instance by ID
        $trainer = Trainer::findOrFail($id);

        // Update the Trainer instance with the validated data
        $trainer->update([
            'trainer_name' => $validatedData['trainer_name'],
            'array_item_ids' => $array_item_ids,
            'array_qty' => $array_qty,
        ]);

        // Redirect back or return a response as needed
        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully');
    }

 
    
    



    // Add methods for showing, editing, updating, and deleting trainers as needed
}

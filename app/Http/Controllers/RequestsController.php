<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $requestQuery = Requests::query();

        // if ($request->filled('role')) {
        //     $requestQuery->where('role', $request->role);
        // }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $requestQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }
        $requests = $requestQuery->paginate(5);

        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'reference_number' => 'required|string',
            'items' => 'required|array',
            'requestors' => 'required|array',
            // Add more validation rules as needed
        ]);

        // Create request
        Requests::create($validatedData);

        // Redirect with success message
        return redirect()->route('requests.create')->with('success', 'Request created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requests = Requests::findOrFail($id);

        return view('requests.show', compact('requests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requests = Requests::findOrFail($id);
        $requests->delete();

        return redirect()->route('requests.index')->with('success', 'User deleted successfully.');
    }

    public function showCreateForm()
    {
        return view('create-request-form');
    }

    public function showLogList()
    {
        return view('log-list-form');
    }

    /**
     * Show the form for tracking a request.
     */
    public function showTrackForm()
    {
        return view('track-request-form');
    }

    /**
     * Track a request by its reference number.
     */
    public function trackRequest(Request $request)
    {
        $referenceNumber = $request->input('reference_number');

        $request = Requests::where('reference_number', $referenceNumber)->first();

        if ($request) {
            // Request found, display details
            return view('track-request-details', compact('request'));
        } else {
            // Request not found
            return back()->with('error', 'Request not found.');
        }
    }
}

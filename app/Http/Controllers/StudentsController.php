<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $studentsQuery = Students::query();

        if ($request->filled('campus')) {
            $studentsQuery->where('campus', $request->campus);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $studentsQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('middle_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }
        $students = $studentsQuery->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'srcode' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'extra_name' => 'nullable|string|max:255',
            'campus' => 'nullable|string|max:255',
            'colleges' => 'nullable|string|max:255',
            'programs' => 'nullable|string|max:255',
            // 'courses' => 'nullable|string',
        ]);

        // Create a new student instance with the validated data
        $student = Students::create($validatedData);

        // Optionally, you can flash a success message here
        session()->flash('success', 'Student created successfully.');

        // Redirect the students to a relevant page, such as the list of students
        return redirect()->route('students.index')->with('success', 'Students created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Students::findOrFail($id);

        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Students::findOrFail($id);

        return view('students.edit', compact('students'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'srcode' => 'required|string|max:10|unique:students,srcode,' . $id,
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'extra_name' => 'nullable|string|max:255',
            'campus' => 'nullable|string|max:255',
            'colleges' => 'nullable|string|max:255',
            'programs' => 'nullable|string|max:255',
            // 'courses' => 'nullable|string',
        ]);

        $students = Students::findOrFail($id);

        $students->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Students updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Students::findOrFail($id);
        $students->delete();

        return redirect()->route('students.index')->with('success', 'Students deleted successfully.');
    }
}

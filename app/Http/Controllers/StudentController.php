<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     // Display all students
    public function index()
    {
        $students = Student::all();

        return view('student.list', compact('students'));
    }

    // Show the create form
    public function create()
    {
        return view('student.create');
    }

    // Save a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        Student::create($validated);

        return redirect('/students')->with('success', 'Student created successfully!');
    }

    // Display one student
    public function show(Student $student)
    {
        return view('student.detail', compact('student'));
    }

    // Show the edit form
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    // Update a student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $student->update($validated);

        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted successfully!');
    }
}

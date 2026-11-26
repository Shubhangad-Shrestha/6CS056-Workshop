<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $validated = $request->validate($this->rules());

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');
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
        $validated = $request->validate($this->rules($student));

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }

    // Reusable student validation rules
    private function rules(?Student $student = null): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student?->id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ];
    }
}
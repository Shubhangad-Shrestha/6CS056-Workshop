<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display all courses
    public function index()
    {
        $courses = Course::all();

        return view('course.list', compact('courses'));
    }

    // Show create form
    public function create()
    {
        return view('course.create');
    }

    // Save a new course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Course::create($validated);

        return redirect('/courses')->with('success', 'Course created successfully!');
    }

    // Display one course
    public function show(Course $course)
    {
        return view('course.detail', compact('course'));
    }

    // Show edit form
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    // Update a course
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $course->update($validated);

        return redirect('/courses')->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}

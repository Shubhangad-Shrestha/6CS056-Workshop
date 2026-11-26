<x-layouts.app>
    <h1>Course Details</h1>

    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Course Name:</strong> {{ $course->name }}</p>
    <p><strong>Description:</strong> {{ $course->description ?? 'Not provided' }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
    <p><strong>Fee:</strong> {{ $course->fee }}</p>
    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
    <p><strong>Status:</strong> {{ $course->is_active ? 'Active' : 'Inactive' }}</p>

    <br>

    <a href="{{ route('courses.index') }}" class="btn">
        Back to Courses
    </a>

    <a href="{{ route('courses.edit', $course) }}" class="btn">
        Edit Course
    </a>
</x-layouts.app>
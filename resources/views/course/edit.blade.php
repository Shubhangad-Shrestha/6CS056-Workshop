<x-layouts.app>
    <h1>Edit Course</h1>

    <a href="{{ route('courses.index') }}">Back to Courses</a>

    <br><br>

    <x-courses.form
        :course="$course"
        :action="route('courses.update', $course)"
        method="PUT"
    />
</x-layouts.app>
<x-layouts.app>
    <h1>Add New Course</h1>

    <a href="{{ route('courses.index') }}">Back to Courses</a>

    <br><br>

    <x-courses.form
        :action="route('courses.store')"
    />
</x-layouts.app>

<x-layouts.app>
    <h1>Add New Student</h1>

    <a href="{{ route('students.index') }}">Back to Students</a>

    <br><br>

    <x-students.form
        :action="route('students.store')"
    />
</x-layouts.app>

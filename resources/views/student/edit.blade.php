
<x-layouts.app>
    <h1>Edit Student</h1>

    <a href="{{ route('students.index') }}">Back to Students</a>

    <br><br>

    <x-students.form
        :student="$student"
        :action="route('students.update', $student)"
        method="PUT"
    />
</x-layouts.app>

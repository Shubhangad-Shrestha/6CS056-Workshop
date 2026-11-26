
<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
</head>
<body>
    <h1>Courses</h1>

    <a href="/courses/create">Add New Course</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration (Weeks)</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
    <a href="/courses/{{ $course->id }}">View</a>
    <a href="/courses/{{ $course->id }}/edit">Edit</a>

    <form action="/courses/{{ $course->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this course?')">
            Delete
        </button>
    </form>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

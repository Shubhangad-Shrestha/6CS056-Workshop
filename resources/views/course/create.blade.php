
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>
    <h1>Add New Course</h1>

    <a href="/courses">Back to Courses</a>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses" method="POST">
        @csrf

        <label>Course Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description" required>{{ old('description') }}</textarea>
        <br><br>

        <label>Duration (Weeks):</label>
        <input type="number" name="duration" value="{{ old('duration') }}" min="1" required>
        <br><br>

        <label>Fee:</label>
        <input type="number" name="fee" value="{{ old('fee') }}" step="0.01" min="0" required>
        <br><br>

        <label>Difficulty:</label>
        <select name="difficulty" required>
            <option value="">Select Difficulty</option>
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
        </select>
        <br><br>

        <label>
            <input type="checkbox" name="is_active" value="1" checked>
            Active
        </label>
        <br><br>

        <button type="submit">Save Course</button>
    </form>
</body>
</html>

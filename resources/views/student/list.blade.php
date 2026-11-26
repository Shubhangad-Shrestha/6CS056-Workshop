
<x-layouts.app>
    <h1>Students</h1>

    <x-alert />

    <a href="{{ route('students.create') }}" class="btn">
        Add New Student
    </a>

    <br><br>

    <table border="1" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->age ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('students.show', $student) }}">View</a>

                        |

                        <a href="{{ route('students.edit', $student) }}">Edit</a>

                        |

                        <x-delete-form
                            :action="route('students.destroy', $student)"
                        />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>

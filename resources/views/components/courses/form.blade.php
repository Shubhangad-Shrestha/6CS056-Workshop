@props([
    'course' => null,
    'action',
    'method' => 'POST',
])

<form action="{{ $action }}" method="POST">
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    <x-alert />

    <x-form-input
        name="name"
        label="Course Name"
        :value="$course?->name ?? ''"
    />

    <x-form-textarea
        name="description"
        label="Description"
        :value="$course?->description ?? ''"
    />

    <x-form-input
        name="duration"
        label="Duration (Weeks)"
        type="number"
        :value="$course?->duration ?? ''"
    />

    <x-form-input
        name="fee"
        label="Fee"
        type="number"
        :value="$course?->fee ?? ''"
    />

    <div class="form-group">
        <label for="difficulty">Difficulty</label>

        <select name="difficulty" id="difficulty" class="form-control">
            <option value="">Select Difficulty</option>

            <option value="Easy" {{ old('difficulty', $course?->difficulty) === 'Easy' ? 'selected' : '' }}>
                Easy
            </option>

            <option value="Medium" {{ old('difficulty', $course?->difficulty) === 'Medium' ? 'selected' : '' }}>
                Medium
            </option>

            <option value="Hard" {{ old('difficulty', $course?->difficulty) === 'Hard' ? 'selected' : '' }}>
                Hard
            </option>
        </select>

        @error('difficulty')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <input type="hidden" name="is_active" value="0">

        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $course?->is_active ?? true) ? 'checked' : '' }}
            >
            Active
        </label>
    </div>

    <button type="submit" class="btn">
        {{ $course ? 'Update Course' : 'Save Course' }}
    </button>
</form>
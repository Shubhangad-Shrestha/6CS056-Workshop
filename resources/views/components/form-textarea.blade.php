
@props([
    'name',
    'label',
    'value' => '',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        rows="4"
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <small style="color:red;">{{ $message }}</small>
    @enderror
</div>

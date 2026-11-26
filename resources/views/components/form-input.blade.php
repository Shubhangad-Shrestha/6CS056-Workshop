
@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="form-control"
    >

    @error($name)
        <small style="color:red;">{{ $message }}</small>
    @enderror
</div>

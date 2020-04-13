@props(['name', 'placeholder'])

<div class="form-group">
    <input name="{{ $name }}"
           class="form-control @if($errors->has($name)) is-invalid @endif"
           placeholder="{{ $placeholder ?? "Insert your " . ucfirst($name) }}"
           value="{{ old($name) }}"
           {{ $attributes }}>
    <div class="invalid-feedback">
        @error($name) {{$message}} @enderror
    </div>
</div>

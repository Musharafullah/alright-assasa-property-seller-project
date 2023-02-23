@php
    $inputValue = old($name, isset($inputValue) && $inputValue ? $inputValue : '');
@endphp
<label for="input{{ $name }}" class="form-label">{{ $title }}</label>
<input   type="{{ isset($type) ? $type : 'text' }}" name="{{ $name }}" @if (isset($inputValue) && $inputValue) value="{{ $inputValue }}" @endif class="form-control" id="input{{ $name }}"
       @if (isset($required) && $required == true) required @endif @if (isset($size) && $size) size="{{ $size }}" @endif @if (isset($accept) && $accept) accept="{{ $accept }}" @endif>
<span class="text-danger">
    @error($name)
        {{ $message }}
    @enderror
</span>

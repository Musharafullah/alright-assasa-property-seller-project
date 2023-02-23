{{--
    string $name: required
    string $title: required
    bool $required: optional
    array $data: required
    string $valueKey: optional
    string $dataKey: optional
    int|float|double|bool|string $selectedValue: optional
--}}
@php
    
    $selectedValue = old($name, isset($selectedValue) && $selectedValue ? $selectedValue : '');
    $inputSelectId = isset($key) && $key ? $key : "input{$name}";
@endphp
<label for="{{ $inputSelectId }}}}" class="form-label"> {{ $title }} </label>
<select name="{{ $name }}" id="{{ $inputSelectId }}}}" class="form-select hs ag"
    @if (isset($required) && $required == true)  @endif>
    <option value="">Select</option>
    @foreach ($data as $select_single_option_value)
        @php
            $v = isset($valueKey) && $valueKey ? $select_single_option_value->{$valueKey} : $select_single_option_value;
            $d = isset($dataKey) && $dataKey ? $select_single_option_value->{$dataKey} : $select_single_option_value;
        @endphp
        <option value="{{ $v }}" @if (isset($selectedValue) && $selectedValue == $v) selected @endif>
            {{ Str::replace('_', ' ', Str::title($d)) }}
        </option>
    @endforeach
</select>
<span class="text-danger">
    @error($name)
        {{ $message }}
    @enderror
</span>

<div class="d-flex flex-column">
    <label for="input{{ $name }}" class="form-label">{{ $title }}</label>
    <select name="{{ $name }}[]" id="input{{ $name }}" class="selectpicker" multiple
        @if (isset($required) && $required == true) required @endif>
        @foreach ($data as $select_single_option_value)
            @php
                $v = isset($valueKey) && $valueKey ? $select_single_option_value[$valueKey] : $select_single_option_value;
                $d = isset($dataKey) && $dataKey ? $select_single_option_value[$dataKey] : $select_single_option_value;
                $isSelected = isset($selectedValuesArray) && $selectedValuesArray ? in_array($v, $selectedValuesArray) : false;
            @endphp
            <option value="{{ $v }}" @if ($isSelected) selected @endif>{{ $d }}
            </option>
        @endforeach
    </select>
    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>
</div>

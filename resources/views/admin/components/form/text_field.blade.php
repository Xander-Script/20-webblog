<label for="{{ $name }}">{{ $label }}</label>
<input
    type="text"
    id="{{ $name }}"

    @if($disabled)
        disabled
    @endif
/>

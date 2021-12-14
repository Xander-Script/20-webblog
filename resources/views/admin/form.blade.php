<form action="{{ '$action' }}" method="{{ '$method' }}">

    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

@foreach($rows as $row)

    <fieldset>
        @if (!empty($row->title))
            <legend>{{ $row->title }}</legend>
        @endif

        @if (!empty($row->description))
            <p>{{ $row->description }}</p>
        @endif

        @forelse($row->fields as $field)
                <label for="{{ $field->name }}">
                    @if ($field->type == "checkbox")
                        <input
                            name="{{ $field->name }}"
                            id="{{ $field->name }}"
                            type="checkbox"
                            {{ $field->disabled ? 'disabled' : '' }}
                            {{ $field->value ? 'checked' : '' }}
                        />
                    @endif

                    @if (!empty($field->label))
                        {{ $field->label }}
                    @else
                        {{ Str::Headline($field->name) }}
                    @endif
                </label>
                @if($field->type != 'checkbox')
                    @if ($field->type == "textarea")
                            <x-trix name="{{ $field->name }}">{{ $field->value }}</x-trix>
                    @elseif ($field->type == 'select')
                        <select name="{{ $field->name }}" id="{{ $field->name }}">
                            <option value="...">...</option>
                        </select>
                    @elseif ($field->type == 'datetime')
                        @if ($field->disabled)
                            <p>
                                <input type="text" disabled value="{{ $field->value->format('F j, Y g:s A') }}">
                            </p>
                        @else
                            <x-flat-pickr
                                name="{{ $field->name }}"
                                value="{{ $field->value }}"
                            />
                        @endif
                    @else
                        <input
                            type="{{ $field->type }}"
                            name="{{ $field->name }}"
                            id="{{ $field->name }}"
                            value="{{ $field->value }}"
                            placeholder="{{ $field->placeholder }}"
                            {{ $field->disabled ? 'disabled' : '' }}
                        >
                    @endif
                @endif
        @empty
            {{-- do nothing. --}}
        @endforelse
    </fieldset>
@endforeach
</form>

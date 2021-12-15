<x-admin-layout>
    @if (!$rows->count())
        <div role="alert" class="info">
            There are no results.
        </div>
    @else
        <table>
            <thead>
            <tr>
                @foreach($fields as $field)
                    <th>{{$field->label}}</th>
                @endforeach
                    <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        @foreach($fields as $field)
{{--                            <td>{{ $row->{$field->name} }}</td>--}}
                            {!! $field->table($row)->render() !!}
                        @endforeach
                        <td>
                            <button class="success">view</button>
                        </td>
                        <td>
                            <button class="info">edit</button>
                        </td>
                        <td>
                            <button class="danger">destroy</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-admin-layout>

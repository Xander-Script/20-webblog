<x-admin-layout>
    @if ($rows->count())
        <table>
            <thead>
            <tr>
            @foreach($fields as $field)
                <th>{{ Str::headline($field) }}</th>
            @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($rows as $row)
                <tr>
                @foreach($fields as $field)
                    <td>{{ $row->{$field} }}</td>
                @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div role="alert" class="info">
            There are no results.
        </div>
    @endif
</x-admin-layout>

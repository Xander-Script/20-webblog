<td>
    @if(!empty($route))
        <a href="{{ $route }}">{{ $value }}</a>
    @else
        {{ $value }}
    @endif
</td>

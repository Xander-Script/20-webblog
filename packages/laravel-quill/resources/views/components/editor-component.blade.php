<div id="{{ $id }}">
    {{ $slot }}
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const {{ $id }} = new Quill('#{{ $id }}', {!! $options !!});
    });
</script>

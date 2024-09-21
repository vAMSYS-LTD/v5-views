<div class="col-span-{{ $data['width']}}">
    <div
        @switch($data['type'])
            @case('info')
                class="alert alert-info ProseMirror"
        @break
        @case('success')
            class="alert alert-success ProseMirror"
        @break
        @case('warning')
            class="alert alert-warning ProseMirror"
        @break
        @case('danger')
            class="alert alert-error ProseMirror"
        @break
        @case('primary')
            class="alert alert-primary ProseMirror"
        @break
        @endswitch
    >
        {{ $content }}
    </div>
</div>

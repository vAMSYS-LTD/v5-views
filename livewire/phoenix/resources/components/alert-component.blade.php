<div class="col-span-{{ $data['width']}}">
    <div
        @switch($data['type'])
            @case('info')
                class="alert alert-info"
        @break
        @case('success')
            class="alert alert-success"
        @break
        @case('warning')
            class="alert alert-warning"
        @break
        @case('danger')
            class="alert alert-error"
        @break
        @case('primary')
            class="alert alert-primary"
        @break
        @endswitch
    >
        <span>{{ $content }}</span>
    </div>
</div>

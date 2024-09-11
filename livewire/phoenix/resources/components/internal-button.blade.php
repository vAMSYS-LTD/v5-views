<div class="mb-4 col-span-{{ $data['width']}}">
    @if($page)
        <div class="mb-4">
            {{ $content }}
        </div>
        <div>
            <a href="{{ $link }}" wire:navigate type="button"
               @switch($data['type'])
                   @case('info')
                       class="btn btn-info w-full"
               @break
               @case('success')
                   class='btn btn-success w-full'
               @break
               @case('warning')
                   class='btn btn-warning w-full'
               @break
               @case('danger')
                   class='btn btn-danger w-full'
               @break
               @case('primary')
                   class='btn btn-primary w-full'
               @break
               @case('secondary')
                   class='btn btn-secondary w-full'
                @break
                @endswitch
            >{{ $data['title'] }}</a>
        </div>
    @endif
</div>

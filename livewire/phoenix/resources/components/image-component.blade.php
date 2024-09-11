<div class="mb-4 col-span-{{ $data['width']}}">
    @if($data['url'])
        <a href="https://{{ $data['url'] }}" target="_blank">
            <img src="{{ Storage::disk('do_spaces')->url($data['image']) }}">
        </a>

    @else
        <img src="{{ Storage::disk('do_spaces')->url($data['image']) }}">
    @endif

</div>

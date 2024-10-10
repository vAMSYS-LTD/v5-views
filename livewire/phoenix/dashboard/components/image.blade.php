<div class="{{ $componentWidth }}">
    @if($this->data['url'])
        <a href="{{ $this->data['url'] }}" target="_blank">
            <img class="rounded-md" src="{{ \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($this->data['image']) }}">
        </a>
    @else
        <img class="rounded-md" src="{{ \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($this->data['image']) }}">
    @endif
</div>

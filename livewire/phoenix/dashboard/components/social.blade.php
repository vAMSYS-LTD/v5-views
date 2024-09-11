<div class="{{ $componentWidth }}">
    @if(count($socialIcons) > 0)
        <div class="flex flex-wrap gap-2 place-items-center card px-4 py-4">
            @foreach($socialIcons as $icon)
                <div class="mx-auto">
                    <a href="{{ $icon['url'] }}" target="_blank">
                        @if(array_key_exists('image_dark', $icon) && $icon['image_dark'])
                            <img x-show="darkMode" src="{{ Storage::disk('do_spaces')->url($icon['image_dark']) }}" alt="{{ $icon['name'] }}">
                            <img x-show="!darkMode" src="{{ Storage::disk('do_spaces')->url($icon['image']) }}" alt="{{ $icon['name'] }}">
                        @else
                            <img src="{{ Storage::disk('do_spaces')->url($icon['image']) }}" alt="{{ $icon['name'] }}">
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>

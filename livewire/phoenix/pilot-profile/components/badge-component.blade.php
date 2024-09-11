<div>
    @if($badges->count() > 0)
        <div class="panel mt-4">
            <div class="mb-5 items-center dark:text-white-light">
                <div class="text-lg font-semibold">{{ $badgesName }}</div>
            </div>
{{--            @foreach($badges->chunk(8) as $chunk)--}}
{{--                <div class="flex justify-around">--}}
{{--                    @foreach($chunk as $badge)--}}
{{--                        <div class="flex flex-col text-center mb-2">--}}
{{--                            <div>--}}
{{--                                <img src="{{ Storage::disk('do_spaces')->url($badge->image) }}" alt="{{ $badge->name }}" class="w-full h-full object-cover" />--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                {{ $badge->pivot->created_at->format('M j, y') }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            @endforeach--}}

                <div class="flex flex-wrap justify-around">
                    @foreach($badges as $badge)
                    <div class="text-center mb-2">
                            <div>
                                <img src="{{ Storage::disk('do_spaces')->url($badge->image) }}" alt="{{ $badge->name }}" class="w-full h-full object-cover" />
                            </div>
                            <div>
                                {{ $badge->pivot->created_at->format('M j, y') }}
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
    @endif
</div>


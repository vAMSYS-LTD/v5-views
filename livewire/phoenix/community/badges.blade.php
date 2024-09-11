<div>
    {{ $this->table }}
{{--    @foreach($badges->chunk(5) as $chunk)--}}
{{--        <div class="flex flex-wrap {{ $chunk->count() == 5 ? 'justify-between' : 'justify-evenly' }} mb-5">--}}
{{--            @foreach($chunk as $badge)--}}
{{--                <div--}}
{{--                    class="max-w-[300px] mb-3 w-full shadow-[4px_6px_10px_-3px_#bfc9d4] rounded-lg border border-[#e0e6ed] dark:border-[#1b2e4b] dark:shadow-none bg-white dark:bg-[#191e3a] }} ">--}}
{{--                    <div class="py-4 px-4">--}}
{{--                        <div class="overflow-hidden flex justify-center items-center">--}}
{{--                            <img src="{{ $badge->image }}" alt="{{ $badge->name }}"--}}
{{--                                 class="max-w-[200px] max-h-[200px] object-cover" />--}}
{{--                        </div>--}}
{{--                        <h5 class="text-[#3b3f5c] mt-2 text-xl text-center font-semibold mb-4 dark:text-white-light">{{ $badge->name }}</h5>--}}
{{--                        <p class="text-white-dark text-justify">{{ $badge->description }}</p>--}}
{{--                        <button type="button" class="btn btn-primary mt-6 w-full">See Recipients</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endforeach--}}
</div>

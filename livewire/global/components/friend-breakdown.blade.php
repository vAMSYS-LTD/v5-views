<div>
    @if($friendAirlines->count() > 0)
        <div class="large-alert alert-info">
            <strong>How about these airlines?</strong> Some of the Virtual Airlines you are a pilot of has partnered with these Virtual Airlines and think you should check them out.
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mt-4">
        @foreach($friendAirlines as $airline)
            <div class="card group hover:bg-gray-200 dark:hover:bg-gray-700 mb-4">
                <div wire:click="redirectRegister({{ $loop->index }}, 'phoenix')" class="cursor-pointer pt-5 pr-5 pl-5">
                    <div class="">
                        <img class="w-full aspect-[9/2]" x-show="!darkMode" src="{{ $airline['logo_bright'] }}">
                        <img class="w-full aspect-[9/2]" x-show="darkMode" src="{{ $airline['logo_dark'] }}">
                    </div>
                    <div class="text-center">
                        @if($airline['slogan'])
                            {{ $airline['slogan'] }}
                        @else
                            &nbsp;
                        @endif
                    </div>
                </div>

                <div class="col-span-6 xl:col-span-3 mt-5">
                    <div class="flex flex-grow-0">
                        <button wire:click="redirectRegister({{ $loop->index }})" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-r-0 rounded-none rounded-bl-md w-full">
                            Register
                        </button>
                        <a href="{{ $airline['website'] }}" target="_blank" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-l-0 rounded-none rounded-br-lg w-full">
                            Visit Website
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
</div>

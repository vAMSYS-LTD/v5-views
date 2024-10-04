<div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
    @foreach($otherAirlines as $airline)
        <div class="card group hover:bg-gray-200 dark:hover:bg-gray-700 mb-4">
            <div wire:click="login({{ $airline['id'] }}, 'phoenix')" class="cursor-pointer pt-5 pr-5 pl-5">
                <div class="">
                    <img class="w-full aspect-[9/2]" x-show="!darkMode" src="{{ $airline['logo_bright'] }}">
                    <img class="w-full aspect-[9/2]" x-show="darkMode" src="{{ $airline['logo_dark'] }}">
                </div>
                <div class="text-center">
                    @if($airline['pilot_frozen'])
                        <span class="font-bold text-red-700">Pilot Account Frozen</span>
                    @else
                        @if($airline['slogan'])
                            {{ $airline['slogan'] }}
                        @else
                            &nbsp;
                        @endif
                    @endif
                </div>
            </div>

            <div class="col-span-6 xl:col-span-3 mt-5">
                <div class="flex flex-grow-0">
                    @if(!$airline['pilot_vds'] && !$airline['pilot_orwell'])
                        <button wire:click="login({{ $airline['id'] }}, 'phoenix')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary rounded-none rounded-bl-md rounded-br-md w-full">
                            {{ $airline['pilot_username'] }}
                        </button>
                    @else
                        <button wire:click="login({{ $airline['id'] }}, 'phoenix')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-r-0 rounded-none rounded-bl-md w-full">
                            {{ $airline['pilot_username'] }}
                        </button>
                    @endif

                    @if($airline['pilot_vds'] && !$airline['pilot_orwell'])
                        <button wire:click="login({{ $airline['id'] }},'vds')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-l-0 rounded-none rounded-br-lg w-full">VDS
                        </button>
                    @elseif($airline['pilot_vds'])
                        <button wire:click="login({{ $airline['id'] }},'vds')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-x-0 rounded-none w-full">VDS
                        </button>
                    @endif

                    @if($airline['pilot_orwell'])
                        <button wire:click="login({{ $airline['id'] }},'orwell')" type="button" class="btn bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 border-secondary border-l-0 rounded-none rounded-br-lg w-full">
                            @if($teamvAMSYS)
                                {{ $airline['prefix'].$airline['id'] }}
                            @else
                                Orwell
                            @endif
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

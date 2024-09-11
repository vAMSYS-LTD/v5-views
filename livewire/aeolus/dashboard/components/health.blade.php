<div wire:poll.10s>
    <div class="mb-4">
        <div class="flex-1 text-sm">
            <div class="grid grid-cols-6 gap-4">
                @foreach($health as $healthItem)
                    <div class="bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                        <div class="flex justify-between mb-2">
                            <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">{{ $healthItem->label }}</h6>
                            @if($loop->first)
                                <span wire:click="$refresh" class="text-xs my-auto cursor-pointer">{{ $lastCheck->diffForHumans() }}</span>
                            @endif
                        </div>
                        <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                            <div class="flex w-full gap-4">
                                @if($healthItem->status == 'ok')
                                    <div class="font-bold text-xl text-success mx-auto">Ok</div>
                                @else
                                    <div class="font-bold text-xl text-danger mx-auto">{{ $healthItem->shortSummary }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

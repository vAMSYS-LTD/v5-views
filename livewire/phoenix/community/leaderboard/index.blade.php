<div class="grid gap-4">
    @if($this->hubs)
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between items-center">
                    <h4 class="card-title mb-1">Global Leaderboard</h4>
                </div> <!-- card-title end -->
                <div class="pt-5">
                    <div class="flex gap-3">
                        <div data-fc-type="tab" class="grid md:grid-cols-10 gap-4 w-full">
                            <nav class="flex md:flex-col gap-2 space-y-2 tablist" aria-label="Tabs" role="tablist">
                                <button data-fc-target="#vertical-tab-with-border-1" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent active" id="vertical-tab-with-border-item-1" aria-controls="vertical-tab-with-border-1" role="tab">
                                    7 Days
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-2" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-2" aria-controls="vertical-tab-with-border-2" role="tab">
                                    Month
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-3" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-3" aria-controls="vertical-tab-with-border-3" role="tab">
                                    Last Month
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-4" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-4" aria-controls="vertical-tab-with-border-4" role="tab">
                                    All Time
                                </button> <!-- button-end -->
                            </nav> <!-- nav-end -->
                            <div class="md:col-span-9 w-full">
                                <div id="vertical-tab-with-border-1" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1" class="active">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'week'" :hub="null" wire:key="week"/>
                                </div> <!-- vertical-tab-with-border-1 end -->
                                <div id="vertical-tab-with-border-2" class="hidden" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-2">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'month'" :hub="null" wire:key="month"/>
                                </div> <!-- vertical-tab-with-border-2 end -->
                                <div id="vertical-tab-with-border-3" class="hidden" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-3">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'last'" :hub="null" wire:key="last"/>
                                </div> <!-- vertical-tab-with-border-3 end -->
                                <div id="vertical-tab-with-border-4" class="hidden" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-4">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'all'" :hub="null" wire:key="all"/>
                                </div> <!-- vertical-tab-with-border-3 end -->
                            </div>
                        </div> <!-- tab-end -->
                    </div>
                </div>
            </div>
        </div>
        @foreach($hubs as $hub)
            <div class="card">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h4 class="card-title mb-1">{{ $hub->name }} Leaderboard</h4>
                    </div> <!-- card-title end -->
                    <div class="pt-5">
                        <div class="flex gap-3">
                            <div data-fc-type="tab" class="grid md:grid-cols-10 gap-4 w-full">
                                <nav class="flex md:flex-col gap-2 space-y-2" aria-label="Tabs" role="tablist{{ $hub->id }}">
                                    <button data-fc-target="#vertical-tab-with-border-1{{ $hub->id }}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent active" id="vertical-tab-with-border-item-1{{ $hub->id }}" aria-controls="vertical-tab-with-border-1{{ $hub->id }}" role="tab">
                                        7 Days
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-2{{ $hub->id }}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-2{{ $hub->id }}" aria-controls="vertical-tab-with-border-2{{ $hub->id }}" role="tab">
                                        Month
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-3{{ $hub->id }}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-3{{ $hub->id }}" aria-controls="vertical-tab-with-border-3{{ $hub->id }}" role="tab">
                                        Last Month
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-4{{ $hub->id }}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-4{{ $hub->id }}" aria-controls="vertical-tab-with-border-4{{ $hub->id }}" role="tab">
                                        All Time
                                    </button> <!-- button-end -->
                                </nav> <!-- nav-end -->
                                <div class="md:col-span-9 w-full">
                                    <div id="vertical-tab-with-border-1{{ $hub->id }}" role="tabpanel{{ $hub->id }}" aria-labelledby="vertical-tab-with-border-item-1{{ $hub->id }}" class="active">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'week'" :hub="$hub->id" wire:key="week{{$hub->id}}"/>
                                    </div> <!-- vertical-tab-with-border-1 end -->
                                    <div id="vertical-tab-with-border-2{{ $hub->id }}" class="hidden" role="tabpanel{{ $hub->id }}" aria-labelledby="vertical-tab-with-border-item-2{{ $hub->id }}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'month'" :hub="$hub->id" wire:key="month{{$hub->id}}"/>
                                    </div> <!-- vertical-tab-with-border-2 end -->
                                    <div id="vertical-tab-with-border-3{{ $hub->id }}" class="hidden" role="tabpanel{{ $hub->id }}" aria-labelledby="vertical-tab-with-border-item-3{{ $hub->id }}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'last'" :hub="$hub->id" wire:key="last{{$hub->id}}"/>
                                    </div> <!-- vertical-tab-with-border-3 end -->
                                    <div id="vertical-tab-with-border-4{{ $hub->id }}" class="hidden" role="tabpanel{{ $hub->id }}" aria-labelledby="vertical-tab-with-border-item-4{{ $hub->id }}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'all'" :hub="$hub->id" wire:key="all{{$hub->id}}"/>
                                    </div> <!-- vertical-tab-with-border-3 end -->
                                </div>
                            </div> <!-- tab-end -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

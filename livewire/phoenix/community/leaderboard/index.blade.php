<div class="grid gap-4">
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

    @if($this->hubs && $airline->enable_leaderboard_hubs)
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

    @if($airline->enable_leaderboard_online && $airline->enable_leaderboard_online_split == false)
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between items-center">
                    <h4 class="card-title mb-1">Online Leaderboard</h4>
                </div> <!-- card-title end -->
                <div class="pt-5">
                    <div class="flex gap-3">
                        <div data-fc-type="tab" class="grid md:grid-cols-10 gap-4 w-full">
                            <nav class="flex md:flex-col gap-2 space-y-2" aria-label="Tabs" role="tablistOnlineAll">
                                <button data-fc-target="#vertical-tab-with-border-1OnlineAll" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent active" id="vertical-tab-with-border-item-1OnlineAll" aria-controls="vertical-tab-with-border-1OnlineAll" role="tab">
                                    7 Days
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-2OnlineAll" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-2OnlineAll" aria-controls="vertical-tab-with-border-2OnlineAll" role="tab">
                                    Month
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-3OnlineAll" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-3OnlineAll" aria-controls="vertical-tab-with-border-3OnlineAll" role="tab">
                                    Last Month
                                </button> <!-- button-end -->
                                <button data-fc-target="#vertical-tab-with-border-4OnlineAll" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-4OnlineAll" aria-controls="vertical-tab-with-border-4OnlineAll" role="tab">
                                    All Time
                                </button> <!-- button-end -->
                            </nav> <!-- nav-end -->
                            <div class="md:col-span-9 w-full">
                                <div id="vertical-tab-with-border-1OnlineAll" role="tabpanelOnlineAll" aria-labelledby="vertical-tab-with-border-item-1OnlineAll" class="active">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'week'" :online="'all'" wire:key="weekOnlineAll"/>
                                </div> <!-- vertical-tab-with-border-1 end -->
                                <div id="vertical-tab-with-border-2OnlineAll" class="hidden" role="tabpanelOnlineAll" aria-labelledby="vertical-tab-with-border-item-2OnlineAll">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'month'" :online="'all'" wire:key="monthOnlineAll"/>
                                </div> <!-- vertical-tab-with-border-2 end -->
                                <div id="vertical-tab-with-border-3OnlineAll" class="hidden" role="tabpanelOnlineAll" aria-labelledby="vertical-tab-with-border-item-3OnlineAll">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'last'" :online="'all'" wire:key="lastOnlineAll"/>
                                </div> <!-- vertical-tab-with-border-3 end -->
                                <div id="vertical-tab-with-border-4OnlineAll" class="hidden" role="tabpanelOnlineAll" aria-labelledby="vertical-tab-with-border-item-4OnlineAll">
                                    <livewire:phoenix.community.leaderboard.leaderboard-content :type="'all'" :online="'all'" wire:key="allOnlineAll"/>
                                </div> <!-- vertical-tab-with-border-3 end -->
                            </div>
                        </div> <!-- tab-end -->
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($airline->enable_leaderboard_online && $airline->enable_leaderboard_online_split)
        @foreach($airline->leaderboard_online_networks as $network)
            <div class="card">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <h4 class="card-title mb-1">{{ $network }} Leaderboard</h4>
                    </div> <!-- card-title end -->
                    <div class="pt-5">
                        <div class="flex gap-3">
                            <div data-fc-type="tab" class="grid md:grid-cols-10 gap-4 w-full">
                                <nav class="flex md:flex-col gap-2 space-y-2" aria-label="Tabs" role="tablist{{$network}}">
                                    <button data-fc-target="#vertical-tab-with-border-1{{$network}}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent active" id="vertical-tab-with-border-item-1{{$network}}" aria-controls="vertical-tab-with-border-1{{$network}}" role="tab">
                                        7 Days
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-2{{$network}}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-2{{$network}}" aria-controls="vertical-tab-with-border-2{{$network}}" role="tab">
                                        Month
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-3{{$network}}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-3{{$network}}" aria-controls="vertical-tab-with-border-3{{$network}}" role="tab">
                                        Last Month
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#vertical-tab-with-border-4{{$network}}" type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white btn bg-transparent" id="vertical-tab-with-border-item-4{{$network}}" aria-controls="vertical-tab-with-border-4{{$network}}" role="tab">
                                        All Time
                                    </button> <!-- button-end -->
                                </nav> <!-- nav-end -->
                                <div class="md:col-span-9 w-full">
                                    <div id="vertical-tab-with-border-1{{$network}}" role="tabpanel{{$network}}" aria-labelledby="vertical-tab-with-border-item-1{{$network}}" class="active">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'week'" :online="$network" wire:key="week{{$network}}"/>
                                    </div> <!-- vertical-tab-with-border-1 end -->
                                    <div id="vertical-tab-with-border-2{{$network}}" class="hidden" role="tabpanel{{$network}}" aria-labelledby="vertical-tab-with-border-item-2{{$network}}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'month'" :online="$network" wire:key="month{{$network}}"/>
                                    </div> <!-- vertical-tab-with-border-2 end -->
                                    <div id="vertical-tab-with-border-3{{$network}}" class="hidden" role="tabpanel{{$network}}" aria-labelledby="vertical-tab-with-border-item-3{{$network}}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'last'" :online="$network" wire:key="last{{$network}}"/>
                                    </div> <!-- vertical-tab-with-border-3 end -->
                                    <div id="vertical-tab-with-border-4{{$network}}" class="hidden" role="tabpanel{{$network}}" aria-labelledby="vertical-tab-with-border-item-4{{$network}}">
                                        <livewire:phoenix.community.leaderboard.leaderboard-content :type="'all'" :online="$network" wire:key="all{{$network}}"/>
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

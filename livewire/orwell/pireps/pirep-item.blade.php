<div>
    @if($pirep->type != 'external transfer' && $pilotView == false)
        <livewire:orwell.pireps.components.pirep-staff-actions :$pirep />
    @endif

    <div class="w-full space-y-2">
        <livewire:orwell.pireps.components.pirep-map :$pirep/>

        <livewire:orwell.pireps.components.alert-component :$pirep />

        <div class="grid xl:grid-cols-3 gap-2">
            <div class="xl:col-span-2 flex flex-col space-y-2">
                <livewire:orwell.pireps.components.pirep-data-component :$pirep />
                @if($pirep->log)
                    <livewire:orwell.pireps.components.data-log-component :$pirep />
                @endif
            </div>

            <div class="col-span-1 flex flex-col space-y-2">
                @if(isset($pirep->pirep_data->autoreject))
                    <livewire:orwell.pireps.components.reject-component :$pirep />
                @endif
                @if($pilotView)
                    <div class="card">
                        <div class="card-header flex justify-between items-center">
                            <h4 class="card-title">PIREP Comments</h4>
                            <div>
                                @if(isset($pirep->pirep_data->autoreject) && isset($pirep->pirep_data->diversions) && collect($pirep->pirep_data->autoreject)->where('diversion', '=', true)->count() > 0)
                                    {{ $this->addDiversionAction }}
                                @else
                                    {{ $this->addCommentAction }}
                                @endif
                            </div>
                        </div>

                        <div class="card w-full overflow-auto">
                            <div class="px-6 pb-6 pt-2 h-[328px]">
                                <div class="space-y-2 divide-y pb-6">
                                    @foreach($comments as $comment)
                                        <div class="flex flex-col">
                                            <div class="flex w-full justify-between text-xs mt-2">
                                                <div>
                                                    @if($comment->hide_name)
                                                        Staff
                                                    @elseif($comment->pilot)
                                                        {{ $comment->pilot->user->full_name }}
                                                    @else
                                                        System
                                                    @endif
                                                </div>
                                                <div>
                                                    {{ $comment->created_at->format('jS M y H:i\z') }}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="grow">
                                                    {!! nl2br($comment->comment) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <livewire:orwell.pireps.components.point-component :$pirep />
                <livewire:orwell.pireps.components.route-component :$pirep />
                <livewire:orwell.pireps.components.weather-info-component :$pirep />
                <livewire:orwell.pireps.components.comparison-component :$pirep />
            </div>
        </div>
    </div>
        @if($pilotView)
            <x-filament-actions::modals />
        @endif
</div>

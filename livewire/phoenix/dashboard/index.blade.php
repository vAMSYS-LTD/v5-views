<div class="space-y-2">
    <livewire:global.system.system-alerts/>
    <x-alerts.danger title="Unmet Activity Requirement" />

    @if($this->pilot->under_activity_grace)
        <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $pilot->airline->identifier, 'pilotUsername' => $pilot->username]) }}">
            <x-alerts.danger class="mb-4" title="Not Meeting Activity Requirements" content="Your Pilot Account does not meet our activity requirements. Please check Your Profile for details."/>
        </a>
    @endif

    @livewire('global.system.pirep-alerts')

    @foreach($layout as $row)
        <div class="grid grid-cols-1 lg:grid-cols-6 gap-2">
            @foreach($row['data']['width_blocks'] as $block)
                @switch($block['type'])
                    @case('block_full')
                        <div class="lg:col-span-6">
                            <div class="flex flex-wrap w-full space-y-2">
                                @foreach($block['data']['block_content'] as $component)
                                    @include('livewire.phoenix.dashboard.components.component-renderer', ['component' => $component])
                                @endforeach
                            </div>

                        </div>
                        @break
                    @case('block_half')
                        <div class="lg:col-span-3">
                            <div class="flex flex-wrap w-full space-y-2">
                                @foreach($block['data']['block_content'] as $component)
                                    @include('livewire.phoenix.dashboard.components.component-renderer', ['component' => $component])
                                @endforeach
                            </div>

                        </div>
                        @break
                    @case('block_third')
                        <div class="lg:col-span-2 h-full flex flex-col justify-between space-y-2">
                            @foreach($block['data']['block_content'] as $component)
                                @include('livewire.phoenix.dashboard.components.component-renderer', ['component' => $component])
                            @endforeach
                        </div>
                        @break
                    @case('block_two_thirds')
                        <div class="lg:col-span-4">
                            <div class="flex flex-wrap w-full space-y-2">
                                @foreach($block['data']['block_content'] as $component)
                                    @include('livewire.phoenix.dashboard.components.component-renderer', ['component' => $component])
                                @endforeach
                            </div>

                        </div>
                        @break
                @endswitch
            @endforeach
        </div>
    @endforeach
</div>

@php
    $width = match($component['data']['width']) {
        'full' => 'w-full',
        '33' => 'w-full md:w-1/3',
        '50' => 'w-full md:w-1/2',
        '66' => 'w-full md:w-2/3'
    }
@endphp

@switch($component['type'])
    @case('pilot_statistics_component')
        <livewire:phoenix.dashboard.components.statistic-boxes componentWidth="{{ $width }} p-1" :select-tab="$component['data']['selectTab']"/>
        @break
    @case('pilot_statistics_slim_component')
        <livewire:phoenix.dashboard.components.statistic-boxes-slim componentWidth="{{ $width }} p-1" :select-tab="$component['data']['selectTab']"/>
        @break
    @case('alerts_component')
        <livewire:global.system.airline-alerts componentWidth="{{ $width }} p-1"/>
        @break
    @case('notam_component')
        <livewire:phoenix.dashboard.components.notams componentWidth="{{ $width }} p-1" :settings="$component['data']"/>
        @break
    @case('boxes_component')
        <livewire:phoenix.dashboard.components.boxes componentWidth="{{ $width }} p-1" wire:key="dashboard.boxes" :block="$block['type']" :width="$component['data']['width']"
                                                     :settings="$component['data']"/>
        @break
    @case('buttons_component')
        <livewire:phoenix.dashboard.components.buttons componentWidth="{{ $width }} p-1" :data="$component['data']"/>
        @break
    @case('social_component')
        <livewire:phoenix.dashboard.components.social componentWidth="{{ $width }} p-1"/>
        @break
    @case('event_component')
        <livewire:phoenix.dashboard.components.events componentWidth="{{ $width }} p-1" type="event_component" :settings="$component['data']"/>
        @break
    @case('event_single_component')
        <livewire:phoenix.dashboard.components.events componentWidth="{{ $width }} p-1" type="event_single_component" :settings="$component['data']"/>
        @break
    @case('flight_map_component')
                <livewire:phoenix.flight-center.flight-map-js componentWidth="{{ $width }}" :settings="$component['data']"
                                                              class="flex flex-grow h-full rounded z-0 shadow relative card" dashboard="true"/>
        @break
    @case('flight_list_component')
        <livewire:orwell.dashboard.components.flight-list componentWidth="{{ $width }} p-1"/>
        @break
@endswitch

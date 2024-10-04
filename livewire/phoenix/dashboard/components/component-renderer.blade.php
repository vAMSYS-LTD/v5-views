@php
    $width = match($component['data']['width']) {
        'full' => 'w-full',
        '25' => 'w-full md:w-1/4',
        '33' => 'w-full md:w-1/3',
        '50' => 'w-full md:w-1/2',
        '66' => 'w-full md:w-2/3'
    }
@endphp

@switch($component['type'])
    @case('pilot_statistics_component')
        <livewire:phoenix.dashboard.components.statistic-boxes componentWidth="{{ $width }}" :select-tab="$component['data']['selectTab']"/>
        @break
    @case('pilot_statistics_slim_component')
        <livewire:phoenix.dashboard.components.statistic-boxes-slim componentWidth="{{ $width }}" :select-tab="$component['data']['selectTab']"/>
        @break
    @case('alerts_component')
        <livewire:global.system.airline-alerts componentWidth="{{ $width }}"/>
        @break
    @case('notam_component')
        <livewire:phoenix.dashboard.components.notams componentWidth="{{ $width }}" :settings="$component['data']"/>
        @break
    @case('boxes_component')
        <livewire:phoenix.dashboard.components.boxes componentWidth="{{ $width }}" wire:key="dashboard.boxes" :block="$block['type']" :width="$component['data']['width']"
                                                     :settings="$component['data']"/>
        @break
    @case('buttons_component')
        <livewire:phoenix.dashboard.components.buttons componentWidth="{{ $width }}" :data="$component['data']"/>
        @break
    @case('social_component')
        <livewire:phoenix.dashboard.components.social componentWidth="{{ $width }}"/>
        @break
    @case('event_component')
        <livewire:phoenix.dashboard.components.events componentWidth="{{ $width }}" type="event_component" :settings="$component['data']"/>
        @break
    @case('event_single_component')
        <livewire:phoenix.dashboard.components.events componentWidth="{{ $width }}" type="event_single_component" :settings="$component['data']"/>
        @break
    @case('event_ordinal_component')
        <livewire:phoenix.dashboard.components.events componentWidth="{{ $width }}" type="event_ordinal_component" :settings="$component['data']"/>
        @break
    @case('flight_map_component')
                <livewire:phoenix.flight-center.flight-map-js componentWidth="{{ $width }}" :settings="$component['data']"
                                                              class="flex flex-grow h-full rounded z-0 shadow relative card" dashboard="true"/>
        @break
    @case('flight_list_component')
        <livewire:phoenix.dashboard.components.flight-list componentWidth="{{ $width }}"/>
        @break
@endswitch

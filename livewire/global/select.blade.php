<div>
    <livewire:global.components.select-page-statistics :$airlines />

    <div>
        @if(in_array($user->id, [2,1167,2941,24375,42765]))
            <!-- Quick select for vAMSYS Staff -->
        @endif
        <livewire:global.components.big-airline-breakdown :$airlines />
        <livewire:global.components.small-airline-breakdown :$otherAirlines />
        <livewire:global.components.friend-breakdown :$friendAirlines />
    </div>
</div>

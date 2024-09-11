<div>
    @if($pilot->user_id == $profileUserId)
        <livewire:phoenix.pilot-profile.components.settings-component :$profilePilotId />
    @endif
    @if($settings->profile_show_stats)
        <livewire:phoenix.pilot-profile.components.stats-component :$profilePilotId />
    @endif
    @if($settings->profile_show_badges)
        <livewire:phoenix.pilot-profile.components.badge-component :$profilePilotId />
    @endif
{{--    @if($settings->profile_show_map)--}}
{{--        <livewire:phoenix.pilot-profile.components.flight-map-component :$profilePilotId />--}}
{{--    @endif--}}
    @if($settings->profile_show_bookings || $settings->profile_show_pireps)
        <livewire:phoenix.pilot-profile.components.pirep-and-booking-component :$profilePilotId />
    @endif

</div>

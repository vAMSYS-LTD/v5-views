<div>
{{--    @if($pilot->user_id == $profileUserId)--}}
{{--        <livewire:phoenix.pilot-profile.components.settings-component :$profilePilotId />--}}
{{--    @endif--}}

    <div class="grid grid-cols-5 gap-4">
        <div class="flex flex-col space-y-4 col-span-4">
            <livewire:phoenix.pilot-profile.components.stats-component :$profilePilotId />
            @if(isset($this->airline->activitySettings) && $this->airline->activitySettings->enable_activity)
                <livewire:phoenix.pilot-profile.components.activity-component :$profilePilotId />
            @endif
{{--            <livewire:phoenix.dashboard.components.statistic-boxes :$profilePilotId componentWidth="w-full" select-tab="allTime"/>--}}
            <livewire:phoenix.pilot-profile.components.pirep-and-booking-component :$profilePilotId />
        </div>
        <div class="flex space-y-4 flex-col col-span-1">
            <div
                class="card">
                <div class="px-6 py-2 space-y-2 flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                    <div class="flex flex-col w-full gap-2">
                        <div class="font-bold text-xl text-primary mx-auto">
                            {{ $publicName }}
                        </div>
                        <div class="font-bold text-xl text-primary mx-auto">
                            {{ $username }}
                        </div>
                        <div class="font-bold text-xl text-primary mx-auto">
                            <img class="max-h-10 mx-auto" src="{{ $rank->display_image }}"
                                 alt="{{ $rank->name }}">
                        </div>
                        <div class="font-bold text-md mx-auto">
                            {{ $rank->name }}
                        </div>

                    </div>
                </div>
            </div>
            @if(($youtube || $twitch) && $showSocial)
                <div
                    class="card">
                    <div class="px-6 py-2 space-y-2 flex items-center justify-start -space-x-3 rtl:space-x-reverse mt-2">
                        <div class="flex justify-around w-full gap-2">
                            @if($youtube)
                                <div class="font-bold h-8 w-8 text-xl text-[#FF0000]">
                                    <a href=https://www.youtube.com/{{ $youtube }}"></a> <x-icon name="brands.youtube" />
                                </div>
                            @endif
                            @if($twitch)
                                <div class="font-bold h-8 w-8 text-xl text-[#9146FF]">
                                    <a href="https://www.twitch.tv/{{ $twitch }}" target="_blank"><x-icon name="brands.twitch" /></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <livewire:phoenix.pilot-profile.components.badge-component :$profilePilotId />
            <livewire:phoenix.pilot-profile.components.popular-airports-table :$profilePilotId/>
            <livewire:phoenix.pilot-profile.components.popular-aircraft-table :$profilePilotId/>
        </div>
    </div>



{{--    @if($settings->profile_show_map)--}}
{{--        <livewire:phoenix.pilot-profile.components.flight-map-component :$profilePilotId />--}}
{{--    @endif--}}
    @if($settings->profile_show_bookings || $settings->profile_show_pireps)

    @endif

</div>

<div>
    <div class="panel p-0 mb-5" x-data="{ tab: '{{ $settings->profile_show_pireps?'pireps':'bookings' }}'}">
        <!-- buttons -->
        <div>
            <ul class="flex flex-wrap mt-3 mb-5 border-b border-white-light dark:border-[#191e3a]">
                @if($settings->profile_show_pireps)
                    <li>
                        <a href="javascript:"
                           class="p-5 py-3 -mb-[1px] flex items-center hover:border-b border-transparent hover:!border-secondary hover:text-secondary"
                           :class="{'border-b !border-secondary text-secondary' : tab === 'pireps'}"
                           @click="tab = 'pireps'">
                            PIREPs</a>
                    </li>
                @endif
                @if($settings->profile_show_bookings)
                    <li>
                        <a href="javascript:"
                           class="p-5 py-3 -mb-[1px] flex items-center hover:border-b border-transparent hover:!border-secondary hover:text-secondary"
                           :class="{'border-b !border-secondary text-secondary' : tab === 'bookings'}"
                           @click="tab = 'bookings'">
                            Bookings</a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- description -->
        <div class="flex-1 text-sm ">
            @if($settings->profile_show_pireps)
                <template x-if="tab === 'pireps'">
                    <div>
                        <livewire:phoenix.pilot-profile.components.pirep-table :$profilePilotId />
                    </div>
                </template>
            @endif
            @if($settings->profile_show_bookings)
                <template x-if="tab === 'bookings'">
                    <div>
                        <livewire:phoenix.pilot-profile.components.booking-table :$profilePilotId />
                    </div>
                </template>
            @endif
        </div>
    </div>
</div>

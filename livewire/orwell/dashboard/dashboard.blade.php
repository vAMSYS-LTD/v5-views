<div>
{{--    <script defer src="/assets/js/apexcharts.js"></script>--}}
    <div class="flex flex-col space-y-2">
        <livewire:orwell.dashboard.components.statistic-boxes />

        {{--        <div class="grid gap-4 mb-4 xl:grid-cols-1"> --}}
        {{--            <div> --}}
        {{--                class="relative flex items-center border p-3.5 rounded text-info bg-info-light border-info border-l-[64px] dark:bg-info-dark-light"> --}}
        {{--                <span class="absolute m-auto text-white -left-10 content-evenly"> --}}
        {{--                    <i class="fa-light fa-message-exclamation fa-lg"></i> --}}
        {{--                </span> --}}
        {{--                <span class="pr-2"><strong class="mr-1">Ahoy!</strong> This is a test alert on Orwell only</span> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        <livewire:orwell.dashboard.components.airline-info/>

        <livewire:orwell.dashboard.components.action-boxes/>

        <livewire:orwell.dashboard.components.flight-list/>

        @if($this->airlineStaff->can_view_pilot_list || $this->airlineStaff->vamsys_staff)
            <div class="grid gap-2 xl:grid-cols-2 z-10">
                <livewire:orwell.dashboard.components.recent-bookings/>
                <livewire:orwell.dashboard.components.recent-pilots/>
            </div>
        @endif

{{--        <div class="grid gap-2 xl:grid-cols-2">--}}
{{--            <livewire:orwell.dashboard.components.charts.registrations-chart/>--}}
{{--            <livewire:orwell.dashboard.components.charts.bookings-chart/>--}}
{{--        </div>--}}
    </div>
</div>

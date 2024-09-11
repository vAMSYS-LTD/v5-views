<div class="grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 gap-x-4 gap-y-2">
    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Airports'"
        :popover="''"
        :subtitle="''"
        :values="[
                            ['value' => number_format($airports), 'class' => 'text-success', 'popover' => '']
                        ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Aircraft'"
        :popover="''"
        :subtitle="''"
        :values="[
                            ['value' => number_format($aircraft), 'class' => 'text-success', 'popover' => '']
                        ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Routes'"
        :popover="''"
        :subtitle="''"
        :values="[
                            ['value' => number_format($routes), 'class' => 'text-success', 'popover' => '']
                        ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'30 Day Bookings'"
        :popover="''"
        :subtitle="''"
        :values="[
                            ['value' => number_format($bookings), 'class' => 'text-success', 'popover' => '']
                        ]"
    />
</div>

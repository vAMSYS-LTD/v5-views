<div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-x-4 gap-y-2 mb-4">
    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'PIREPs'"
        :popover="''"
        :subtitle="round($statistics->landingRate).' Avg FPM'"
        :values="[
                    ['value' => number_format($statistics->accepted), 'class' => 'text-success', 'popover' => 'Complete/Accepted'],
                    ['value' => number_format($statistics->rejected), 'class' => 'text-warning', 'popover' => 'Rejected'],
                    ['value' => number_format($statistics->invalidated), 'class' => 'text-danger', 'popover' => 'Invalidated'],
                    ['value' => number_format($statistics->manual), 'class' => 'text-primary', 'popover' => 'Manual/Claims'],
                ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Points'"
        :popover="''"
        :subtitle="'~ '.number_format(divnum($statistics->points + $statistics->bonus, $statistics->accepted)).' per flight'"
        :values="[
                    ['value' => number_format($statistics->points), 'class' => 'text-primary', 'popover' => 'Points'],
                    ['value' => number_format($statistics->bonus), 'class' => 'text-success', 'popover' => 'Bonus Points'],
                ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Time'"
        :popover="''"
        :subtitle="'~'.convertSecToTime(divnum($statistics->time, $statistics->accepted + $statistics->rejected)).' per flight'"
        :values="[
                    ['value' => convertSecToTime($statistics->time), 'class' => 'text-primary', 'popover' => '']
                ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Passengers & Freight'"
        :popover="''"
        :subtitle="'~'. number_format(divnum($statistics->pax,$statistics->accepted + $statistics->rejected)).'/'. number_format(divnum($statistics->cargo, $statistics->accepted + $statistics->rejected)).' per flight'"
        :values="[
                    ['value' => number_format($statistics->pax), 'class' => 'text-primary', 'popover' => ''],
                    ['value' => number_format(convertWeightValue($statistics->cargo, auth()->user())->value) .' '. convertWeightValue($statistics->cargo, auth()->user())->measure, 'class' => 'text-primary', 'popover' => '']
                ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Fuel Used'"
        :popover="''"
        :subtitle="'~'. number_format(divnum($statistics->fuel, $statistics->accepted + $statistics->rejected)).' per flight'"
        :values="[
                    ['value' => number_format(convertWeightValue($statistics->fuel, auth()->user())->value). ' ' .convertWeightValue($statistics->fuel, auth()->user())->measure, 'class' => 'text-primary', 'popover' => '']
                ]"
    />

    <livewire:orwell.dashboard.components.partials.statistics-card
        :title="'Distance'"
        :popover="''"
        :subtitle="'~'.number_format(divnum($statistics->distance, $statistics->accepted + $statistics->rejected)).' NM per flight'"
        :values="[
                    ['value' => number_format($statistics->distance). ' NM', 'class' => 'text-primary', 'popover' => ''],
                ]"
    />
</div>

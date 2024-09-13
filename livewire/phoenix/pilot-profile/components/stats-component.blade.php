@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
    $tabs = ['today', 'last24', 'yesterday', 'thirty', 'yearToDate', 'lastYear', 'allTime'];

    $tabNames = [
        'today' => Carbon::now()->format('jS M'),
        'last24' => '24 Hrs',
        'yesterday' => Carbon::now()->subDay()->format('jS M'),
        'thirty' => '30 Days',
        'yearToDate' => 'This Year',
        'lastYear' => 'Last Year',
        'allTime' => 'All Time',
    ];

    $activeTab = 'allTime'; // Default active tab
@endphp

<div class="w-full">
    <div data-fc-type="tab">
        <nav class="relative z-0 flex flex-col sm:flex-row border rounded-md overflow-hidden dark:border-gray-600 tablist" aria-label="Tabs" role="tablist">
            @foreach ($tabs as $index => $tabKey)
                <button
                    data-fc-target="#{{ $tabKey }}"
                    type="button"
                    class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-2 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400
                @if($tabKey === $activeTab) active @endif"
                    id="bar-with-underline-item-{{ $index + 1 }}"
                    aria-controls="{{ $tabKey }}"
                    role="tab"
                >
                    {{ $tabNames[$tabKey] }}
                </button>
            @endforeach
        </nav>

        <div class="mt-2">
            @foreach ($tabs as $index => $tabKey)
                <div id="{{ $tabKey }}" class="@if($tabKey !== $activeTab) hidden @endif" role="tabpanel" aria-labelledby="bar-with-underline-item-{{ $index + 1 }}">
                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-x-2 gap-y-2">

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'PIREPs'"
                                :popover="''"
                                :subtitle="'As of '.Carbon::parse($data->generatedAt)->format('jS M, H:i').'z'"
                                :values="[
                            ['value' => number_format($data->pireps->$tabKey->accepted), 'class' => 'text-success', 'popover' => 'Complete/Accepted'],
                            ['value' => number_format($data->pireps->$tabKey->rejected), 'class' => 'text-warning', 'popover' => 'Rejected'],
                            ['value' => number_format($data->pireps->$tabKey->invalidated), 'class' => 'text-danger', 'popover' => 'Invalidated'],
                            ['value' => number_format($data->pireps->$tabKey->manual), 'class' => 'text-primary', 'popover' => 'Manual'],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Points'"
                                :popover="''"
                                :subtitle="'~' . number_format(divnum($data->points->$tabKey->sum, $data->pireps->$tabKey->accepted)) . ' per flight'"
                                :values="[
                            ['value' => number_format($data->points->$tabKey->regular), 'class' => 'text-primary', 'popover' => 'Regular Points'],
                            ['value' => number_format($data->points->$tabKey->bonus), 'class' => 'text-success', 'popover' => 'Bonus Points'],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Time & Distance'"
                                :popover="''"
                                :subtitle="''"
                                :values="[
                            ['value' => $data->flightTime->$tabKey->formatted, 'class' => 'text-primary', 'popover' => ''],
                            ['value' => number_format($data->pireps->$tabKey->distanceFlown).' NM', 'class' => 'text-primary', 'popover' => ''],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Pax & Freight'"
                                :popover="''"
                                :subtitle="'~' . number_format(divnum($data->transport->$tabKey->passengers, $data->pireps->$tabKey->accepted + $data->pireps->$tabKey->rejected)).' / ' . number_format(divnum($data->transport->$tabKey->cargo, $data->pireps->$tabKey->accepted + $data->pireps->$tabKey->rejected)) . ' per flight'"
                                :values="[
                            ['value' => number_format($data->transport->$tabKey->passengers), 'class' => 'text-primary', 'popover' => ''],
                            ['value' => number_format(convertWeightValue($data->transport->$tabKey->cargo, auth()->user())->value).' '.convertWeightValue($data->transport->$tabKey->cargo, auth()->user())->measure, 'class' => 'text-primary', 'popover' => ''],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Fuel Used'"
                                :popover="''"
                                :subtitle="'~' . number_format(divnum(convertWeightValue($data->pireps->$tabKey->fuelUsed, auth()->user())->value, $data->pireps->$tabKey->accepted + $data->pireps->$tabKey->rejected)) . ' per flight'"
                                :values="[
                            ['value' => number_format(convertWeightValue($data->pireps->$tabKey->fuelUsed, auth()->user())->value) . ' ' . convertWeightValue($data->pireps->$tabKey->fuelUsed, auth()->user())->measure, 'class' => 'text-primary', 'popover' => ''],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Pilot'"
                                :popover="''"
                                :subtitle="'Pilot Username'"
                                :values="[
                            ['value' => $username, 'class' => '', 'popover' => ''],
                        ]"
                            />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

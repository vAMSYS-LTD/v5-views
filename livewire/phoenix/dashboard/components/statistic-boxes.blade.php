@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
    $tabs = ['today', 'last24', 'yesterday', 'thirty', 'yearToDate', 'lastYear', 'allTime', 'other'];

    $tabNames = [
        'today' => Carbon::now()->format('jS M'),
        'last24' => '24 Hrs',
        'yesterday' => Carbon::now()->subDay()->format('jS M'),
        'thirty' => '30 Days',
        'yearToDate' => 'This Year',
        'lastYear' => 'Last Year',
        'allTime' => 'All Time',
        'other' => 'Details/Settings'
    ];

    $activeTab = $selectTab; // Default active tab
@endphp

<div class="{{ $componentWidth }}">
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
                        @if($tabKey == 'other')
                            <x-filament::section :compact="true" style="height: 100% !important">
                                <x-slot name="heading">
                                    Your Username
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    <h3 class="text-lg">
                                        {{ $pilot->username }}
                                    </h3>
                                </div>
                                {{-- Content --}}
                            </x-filament::section>

                            <x-filament::section :compact="true" style="height: 100% !important">
                                <x-slot name="heading">
                                    Registration
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    <h3 class="text-lg">
                                        {{ fullFriendlyDateTimeYear($pilot->created_at) }}
                                    </h3>
                                </div>
                                {{-- Content --}}
                            </x-filament::section>

                            <x-filament::section :compact="true" style="height: 100% !important">
                                <x-slot name="heading">
                                    Rank
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    <h3 class="text-lg">
                                        {{ $pilot->preferredRank->name  }}
                                    </h3>
                                    <img class="max-h-10 -m-2" src="{{ $pilot->preferredRank->display_image }}" alt="{{ $pilot->preferredRank->name }}">
                                </div>
                                {{-- Content --}}
                            </x-filament::section>

                            <x-filament::section :compact="true" style="height: 100% !important">
                                <x-slot name="heading">
                                    Airports Visited
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    <h3 class="text-lg">
                                        {{ number_format($uniqueAirports)  }}
                                    </h3>
                                </div>
                                {{-- Content --}}
                            </x-filament::section>

                            <x-filament::section :compact="true" style="height: 100% !important">
                                <x-slot name="heading">
                                    Location / Hub
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    @if($pilot->airport)
                                        <h3 class="text-lg" @mouseenter="$popovers('{{ $pilot->airport->name }}')"
                                            data-trigger="mouseenter">
                                            {{ $pilot->airport->identifier  }}
                                        </h3>
                                    @else
                                        <h3 class="text-lg">
                                            None
                                        </h3>
                                    @endif
                                    <livewire:global.pilot.set-hub-action/>
                                </div>
                                {{-- Content --}}
                            </x-filament::section>

                            <x-filament::section :compact="true">
                                <x-slot name="heading">
                                    Settings / Preferences
                                </x-slot>
                                <div class="flex w-full justify-around gap-2">
                                    <livewire:phoenix.dashboard.components.settings-action-component :data="$data" />
                                </div>
                                {{-- Content --}}
                            </x-filament::section>
                        @else
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
                            ['value' => number_format(convertWeightValue($data->transport->$tabKey->cargo, $pilot)->value).' '.convertWeightValue($data->transport->$tabKey->cargo, $pilot)->measure, 'class' => 'text-primary', 'popover' => ''],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Fuel & Landing Rate'"
                                :popover="''"
                                :subtitle="'~' . number_format(divnum(convertWeightValue($data->pireps->$tabKey->fuelUsed, $pilot)->value, $data->pireps->$tabKey->accepted + $data->pireps->$tabKey->rejected)) . ' per flight'"
                                :values="[
                            ['value' => number_format(convertWeightValue($data->pireps->$tabKey->fuelUsed, $pilot)->value) . ' ' . convertWeightValue($data->pireps->$tabKey->fuelUsed, $pilot)->measure, 'class' => 'text-primary', 'popover' => ''],
                            ['value' => number_format($data->pireps->$tabKey->landingRate). ' FPM', 'class' => 'text-primary', 'popover' => ''],
                        ]"
                            />

                            <livewire:orwell.dashboard.components.partials.statistics-card
                                :title="'Pilot'"
                                :popover="''"
                                :subtitle="'Your Username'"
                                :values="[
                            ['value' => $pilot->username, 'class' => '', 'popover' => ''],
                        ]"
                            />
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-filament-actions::modals/>
</div>

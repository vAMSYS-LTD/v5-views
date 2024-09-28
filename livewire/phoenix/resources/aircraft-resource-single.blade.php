<div class="grid sm:grid-cols-3 gap-4">
    <div class="
    @if($aircraft->validImage)
        sm:col-span-2
    @else
        sm:col-span-3
    @endif
     grid gap-4">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">{{ $aircraft->name }} - {{ $aircraft->registration }}</h4>
                <div>
                    {{ $aircraft->type->name }} | {{ $aircraft->type->code }}
                </div>
            </div>

            <div class="px-6 py-2 space-y-2">
                @if($aircraft->type->scoringGroup)
                    <a class="hyperlink" href="{{ route('phoenix.documents.scores') }}">Scoring
                        Group: {{ $aircraft->type->scoringGroup->name }}</a>
                @endif
                <div class="grid sm:grid-cols-4 gap-4">
                    @if($aircraft->passengers > 0 || $aircraft->type->max_pax > 0)
                        <div class="col-span-1">
                            <p class="text-gray-400">Passengers</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ $aircraft->passengers?:$aircraft->type->max_pax }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->cargo > 0 || $aircraft->type->max_cargo > 0)
                        <div class="col-span-1">
                            <p class="text-gray-400">Cargo</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue($aircraft->cargo?:$aircraft->type->max_cargo, $pilot)->value) }} {{ convertWeightValue($aircraft->cargo?:$aircraft->type->max_cargo, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->container_units > 0 || $aircraft->type->container_units > 0)
                        <div class="col-span-1">
                            <p class="text-gray-400">Container Units</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ $aircraft->container_units?:$aircraft->type->container_units }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->oew || $aircraft->type->oew)
                        <div class="col-span-1">
                            <p class="text-gray-400">OEW</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue(($aircraft->oew?:$aircraft->type->oew)*1000, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->oew?:$aircraft->type->oew, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->mzfw || $aircraft->type->mzfw)
                        <div class="col-span-1">
                            <p class="text-gray-400">MZFW</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue(($aircraft->mzfw?:$aircraft->type->mzfw)*1000, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->mzfw?:$aircraft->type->mzfw, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->mtow || $aircraft->type->mtow)
                        <div class="col-span-1">
                            <p class="text-gray-400">MTOW</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue(($aircraft->mtow?:$aircraft->type->mtow)*1000, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->mtow?:$aircraft->type->mtow, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->mlw || $aircraft->type->mlw)
                        <div class="col-span-1">
                            <p class="text-gray-400">MLW</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue(($aircraft->mlw?:$aircraft->type->mlw)*1000, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->mlw?:$aircraft->type->mlw, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif

                    @if($aircraft->max_fuel || $aircraft->type->max_fuel)
                        <div class="col-span-1">
                            <p class="text-gray-400">Max Fuel</p>
                            <div class="gap-3 mt-1">
                                <h5 class="font-medium">{{ number_format(convertWeightValue(($aircraft->max_fuel?:$aircraft->type->max_fuel)*1000, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->max_fuel?:$aircraft->type->max_fuel, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @php
            $props = [
            'cat',
            'equipment',
            'transponder',
            'pbn',
            'hexcode',
            'performance',
            'selcal',
            'fin_number',
            'climb_profile',
            'cruise_profile',
            'civalue',
            'descent_profile',
            'etops',
            'fuel_factor',
            'paxwgt',
            'bagwgt'
            ];

            $display_props = array_filter($props, fn($prop) => !empty($aircraft->{$prop}) || !empty($aircraft->type->{$prop}));

            $labels = [
            'cat' => 'CAT',
            'equipment' => 'Equipment',
            'transponder' => 'Transponder',
            'pbn' => 'PBN',
            'hexcode' => 'Hexcode',
            'performance' => 'Performance Category',
            'selcal' => 'SELCAL',
            'fin_number' => 'Fin Number',
            'climb_profile' => 'Climb Profile',
            'cruise_profile' => 'Cruise Profile',
            'civalue' => 'Cost Index',
            'descent_profile' => 'Descent Profile',
            'etops' => 'ETOPS',
            'fuel_factor' => 'Fuel Factor',
            'paxwgt' => 'PAX Weight',
            'bagwgt' => 'Bag Weight (per PAX)'
            ];
        @endphp

        @if(count($display_props) > 0)
            <div class="card">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">
                        Aircraft Config & Equipment
                    </h4>
                </div>
                <div class="px-6 py-2 space-y-2">
                    <div class="grid sm:grid-cols-4 gap-4">
                        @foreach($display_props as $prop)
                            <div class="col-span-1">
                                <p class="text-gray-400">{{ $labels[$prop] }}:</p>
                                <div class="gap-3 mt-1">
                                    <h5 class="font-medium">
                                        @if(in_array($prop, ['paxwgt', 'bagwgt']))
                                            {{ number_format(convertWeightValue($aircraft->{$prop}?:$aircraft->type->{$prop}, $pilot, reverse: true)->value) }} {{ convertWeightValue($aircraft->{$prop}?:$aircraft->type->{$prop}, $pilot)->measure }}
                                        @else
                                            {{ $aircraft->{$prop}?:$aircraft->type->{$prop} }}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>


        @if($aircraft->validImageLinkback && $aircraft->validImage)
            <div class="card">
                <a href="{{ $aircraft->validImageLinkback }}" target="_blank">
                    <div class="w-full">
                        <img src="{{ $aircraft->validImage }}" alt="image"
                             class="rounded-tl rounded-tr w-full h-full object-cover" />
                        <p class="text-right text-xs m-2">Image By {{ $aircraft->validImageAttribution }}</p>
                    </div>
                </a>
            </div>
        @elseif($aircraft->validImage)
            <div class="card">
                <div class="w-full">
                    <img src="{{ $aircraft->validImage }}" alt="image"
                         class="rounded-tl rounded-tr w-full h-full object-cover" />
                    <p class="text-right text-xs m-2">Image By {{ $aircraft->validImageAttribution }}</p>
                </div>
            </div>
        @endif

    <div class="sm:col-span-3 card">
        {{ $this->table }}
    </div>
</div>

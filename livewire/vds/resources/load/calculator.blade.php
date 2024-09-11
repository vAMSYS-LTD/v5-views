<div>
    <div>
        {{ $this->form }}
    </div>
    @if($calculations->count() > 0)
        @foreach($calculations as $calculation)
            <x-filament::section class="mt-2">
                <x-slot name="heading">
                    Results
                </x-slot>
                <x-slot name="description">
                    Results for Min LF {{ $calculation['min'] }}%, Max LF: {{ $calculation['max'] }}%, Bias
                    of {{ $calculation['favor'] }} and Standard Deviation of {{ $calculation['sd'] }}. <br/>
                    Average results: {{ round($calculation['results']->avg(),2) }}%
                    - {{ number_format(round($this->amount * $calculation['results']->avg()/100)) }}
                </x-slot>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
                    @foreach($calculation['results'] as $result)
                        <div class="grid grid-cols-2">
                            <div>{{ round($result, 2) }}%</div>
                            <div>{{ number_format(round($this->amount * $result/100)) }}</div>
                        </div>
                    @endforeach
                </div>
            </x-filament::section>
        @endforeach
    @endif
</div>

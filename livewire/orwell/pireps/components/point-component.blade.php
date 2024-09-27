<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Points</h4>
    </div>

    <div class="px-6 py-2 space-y-2">
        <div class="flex flex-col justify-start">
            @if(isset($pirep->pirep_data->scores))
                @foreach($pirep->pirep_data->scores as $score)
                    <div class="grid grid-cols-6 text-base">
                        @if($score->points > 0)
                            <div class="font-semibold tracking-wide text-success">+ {{ $score->points }}</div>
                        @elseif($score->points == 0)
                            <div class="font-semibold tracking-wide">{{ $score->points }}</div>
                        @else
                            <div class="font-semibold tracking-wide text-danger">{{ $score->points }}</div>
                        @endif

                        <div class="col-span-5">
                            {{ $score->name }}
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
        <div class="font-semibold mt-2">
            Points: {{ $pirep->points }}
        </div>
        @if(isset($pirep->pirep_data->bonus_scores))
            <div class="flex flex-row justify-start mt-4">
                <div class="my-auto font-semibold tracking-wide">
                    @foreach($pirep->pirep_data->bonus_scores as $score)
                        @if($score->points > 0)
                            <div class="text-success">+ {{ $score->points }}</div>
                        @elseif($score->points == 0)
                            <div class="">{{ $score->points }}</div>
                        @else
                            <div class="text-danger">{{ $score->points }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="my-auto ml-4">
                    @foreach($pirep->pirep_data->bonus_scores as $score)
                        <div>{{ $score->name }}</div>
                    @endforeach
                </div>
            </div>
            <div class="font-semibold mt-2">
                Bonus Points: {{ $pirep->bonus_sum }}
            </div>
        @endif
    </div>
</div>

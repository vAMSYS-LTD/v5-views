<div class="flex flex-col space-y-4">

    <livewire:phoenix.dashboard.components.statistic-boxes selection="ranks"/>

    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Pilot Ranks</h4>
        </div>
        <div class="px-6 py-2">
            @php
                $split1 = ceil($this->ranks->count() / 3);
                $split2 = ceil(($this->ranks->count() - $split1)/2) + $split1;

                $firstColumn = $this->ranks->take($split1);
                $secondColumn = $this->ranks->slice($split1)->take($split2-$split1);
                $thirdColumn = $this->ranks->slice($split2);
            @endphp
            <div class="grid sm:grid-cols-3">
                @foreach([$firstColumn, $secondColumn, $thirdColumn] as $columnRanks)
                    <div class="flex flex-col rounded-md">
                        @foreach($columnRanks as $rank)
                            <div class="flex px-4 py-2.5 justify-center items-center
                                @if($pilot->rank_id == $rank->id) bg-gray-200 dark:bg-gray-700  @endif
                                ">
                                <div class="">
                                    <img class="max-h-10 mx-auto" src="{{ $rank->display_image }}"
                                         alt="{{ $rank->name }}">
                                </div>
                                <div class="flex-1 ml-4 font-semibold">
                                    <h6 class="mb-1 text-base">{{ $rank->name }}</h6>
                                    <p class="text-xs">
                                        @if($rank->level == 1)
                                            No Requirements
                                        @endif
                                        @if($rank->hours > 0)
                                            Hours: {{ number_format($rank->hours) }}
                                        @endif

                                        @if($rank->points > 0)
                                            @if($rank->hours > 0) <!-- Adds the separator if hours also exists -->
                                            |
                                            @endif
                                            Points: {{ number_format($rank->points) }}
                                        @endif

                                        @if($rank->bonus > 0)
                                            @if($rank->hours > 0 || $rank->points > 0) <!-- Adds the separator if hours or points also exist -->
                                            |
                                            @endif
                                            Bonus Points: {{ number_format($rank->bonus) }}
                                        @endif
                                        @if($rank->pireps > 0)
                                            @if($rank->hours > 0 || $rank->points > 0 || $rank->bonus > 0) <!-- Adds the separator if hours or points also exist -->
                                            |
                                            @endif
                                            Accepted PIREPs: {{ number_format($rank->pireps) }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Team & Honorary Ranks</h4>
        </div>
        <div class="px-6 py-2">
            @php
                $split1 = ceil($honoraryRanks->count() / 3);
                $split2 = ceil(($honoraryRanks->count() - $split1)/2) + $split1;

                $firstColumn = $honoraryRanks->take($split1);
                $secondColumn = $honoraryRanks->slice($split1)->take($split2-$split1);
                $thirdColumn = $honoraryRanks->slice($split2);
            @endphp
            <div class="grid sm:grid-cols-3">
                @foreach([$firstColumn, $secondColumn, $thirdColumn] as $columnRanks)
                    <div class="flex flex-col rounded-md">
                        @foreach($columnRanks as $rank)
                            <div class="flex px-4 py-2.5 justify-center items-center
                                @if($pilot->rank_id == $rank->id) bg-gray-200 dark:bg-gray-700  @endif
                                ">
                                <div class="">
                                    <img class="max-h-10 mx-auto" src="{{ $rank->display_image }}"
                                         alt="{{ $rank->name }}">
                                </div>
                                <div class="flex-1 ml-4 font-semibold">
                                    <h6 class="mb-1 text-base">{{ $rank->name }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

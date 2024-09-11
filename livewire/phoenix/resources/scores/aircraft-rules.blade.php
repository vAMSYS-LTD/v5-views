<div>
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Failure Rules</h4>
        </div>
        @if($groups->count() > 0)
            <div class="mb-5" x-data="{ active: {{ $groups->first()->id }} }">
                @foreach($groups as $group)
                    <div class="border-y-1 border-x-0 font-semibold">
                        <div class="border-b">
                            <button type="button" class="ml-4 p-2 w-full flex items-center"
                                    :class="{'!font-semibold' : active === {{ $group->id }}}"
                                    x-on:click="active === {{ $group->id }} ? active = null : active = {{ $group->id }}">
                                {{ $group->name }}
                            </button>
                            <div x-cloak x-show="active === {{ $group->id }}" x-collapse>
                                <div class="gap-4 columns-1 lg:columns-2 xl:columns-3 p-4">
                                    @foreach($group->aircraftScoringRules as $scoreGroup => $rules)
                                        <div
                                            class="mb-2 break-inside-avoid card dark:border-2 dark:border-gray-500">
                                            <div class="card-header flex justify-between items-center">
                                                <h4>{{ $scoreGroup }}</h4>
                                            </div>
                                            <div
                                                class="flex items-center justify-start">
                                                <div class="striped-table w-full">
                                                    @if($scoreGroup == 'Landing')
                                                        @if($rules->where('scoring_rule_id', '!=', 19)->count() > 0)
                                                            <table class="text-center">
                                                                <thead>
                                                                <tr>
                                                                    <th>Condition</th>
                                                                    <th class="text-right">Points</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($rules->where('scoring_rule_id', '!=', 19) as $rule)
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}</td>
                                                                        @if($rule->scoring_rule_id == 25)
                                                                            <td class="text-right">Starting Points
                                                                                reduced based on % of distance completed
                                                                            </td>
                                                                        @else
                                                                            <td class="text-right">{{ $rule['points'] }}</td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        @endif
                                                        @foreach($rules as $rule)
                                                            @if($rule->scoring_rule_id == 19)
                                                                <table class="text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Evaluation</th>
                                                                        <th>FPM From</th>
                                                                        <th>FPM To</th>
                                                                        <th class="text-right">Points</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($rule->rules['thresholds'] as $threshold)
                                                                        <tr>
                                                                            <td>{{ $threshold['name'] }}</td>
                                                                            <td>{{ abs($threshold['lightest']) == 9999 ?'Infinity':$threshold['lightest'] }}</td>
                                                                            <td>{{ abs($threshold['heaviest']) == 9999 ?'Infinity':$threshold['heaviest']  }}</td>
                                                                            <td class="text-right">{{ $threshold['points'] }}</td>
                                                                        </tr>
                                                                        @if($threshold['adjustment'])
                                                                            <tr>
                                                                                <td class="text-right text-sm"
                                                                                    colspan="4">
                                                                                    <div class="flex w-full justify-end">
                                                                                        <div class="mr-2 text-xs">{{ $threshold['adjustPoints'] }} {{ \Illuminate\Support\Str::plural('point', $threshold['adjustPoints']) }}
                                                                                            per FPM away
                                                                                            from {{ $threshold['direction'] == 'lighter' ? $threshold['heaviest'] : $threshold['lightest'] }}
                                                                                            in {{ $threshold['direction'] }}
                                                                                            direction</div>
                                                                                        <div><x-icon class="w-4 h-4" name="regular.chevron-up" /></div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <table class="text-left">
                                                            <thead>
                                                            <tr>
                                                                <th>Condition</th>
                                                                <th class="text-right">Points</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($rules as $rule)
                                                                @if($rule->scoring_rule_id == 16)
                                                                    @foreach($rule->rules['thresholds'] as $threshold)
                                                                        <tr>
                                                                            <td>{{ $threshold['name'] }}</td>
                                                                            <td class="text-right">{{ $threshold['thresholdPoints'] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @elseif($rule->scoring_rule_id == 19)
                                                                    @foreach($rule->rules['thresholds'] as $threshold)
                                                                        <tr>
                                                                            <td>{{ $threshold['name'] }}</td>
                                                                            <td class="text-right">{{ $threshold['points'] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}</td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                    @if($rule->scoring_rule_id == 22)
                                                                        <tr>
                                                                            <td class="text-right text-sm"
                                                                                colspan="2">
                                                                                <div class="flex w-full justify-end">
                                                                                    <div class="mr-2 text-xs">per second after {{ $rule->rules['buffer'] }} {{ Str::plural('second', $rule->rules['buffer']) }} </div>
                                                                                    <div><x-icon class="w-4 h-4" name="regular.chevron-up" /></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endif
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

</div>

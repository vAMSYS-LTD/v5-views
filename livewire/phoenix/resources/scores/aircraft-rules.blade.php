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
                                                                            <td>{{ abs($threshold['heaviest']) == 9999 ?'∞':$threshold['heaviest']  }}</td>
                                                                            <td>{{ abs($threshold['lightest']) == 9999 ?'- ∞':$threshold['lightest'] }}</td>
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
                                                                @if($rule->scoring_rule_id == 16 || $rule->scoring_rule_id == 46)
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
                                                                @elseif($rule->scoring_rule_id == 17)
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                        <span class="text-xs">Between {{ $rule->rules['moreThan'] }} and {{ $rule->rules['lessThan'] }}</span></td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif($rule->parentRule->category == 'Engines')
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            @if(is_array($rule->rules)) <span class="text-xs">Time Between Engine Starts {{ $rule->rules['engineTime'] }}</span>@endif
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>

                                                                @elseif($rule->scoring_rule_id == 26)
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">Engine Off: {{ $rule->rules['engines'] }}; Time Between Engines: {{ $rule->rules['engineTime'] }}</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif($rule->scoring_rule_id == 27)
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">Engines On: {{ $rule->rules['engines'] }}; Time Between Engines: {{ $rule->rules['engineTime'] }}</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif(in_array($rule->scoring_rule_id, [28,29,44,45]))
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">Time: {{ $rule->rules['engineMinsRequired'] }}</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif(in_array($rule->scoring_rule_id, [15,23]))
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">Min Level: {{ $rule->rules['simLevel'] }}</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif(in_array($rule->scoring_rule_id, [30, 32]))
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">More Than: {{ number_format($rule->rules['moreFuelThan']) }} kg.</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
                                                                @elseif(in_array($rule->scoring_rule_id, [31, 33]))
                                                                    <tr>
                                                                        <td>{{ $rule->friendly_name }}<br/>
                                                                            <span class="text-xs">Less Than: {{ number_format($rule->rules['lessFuelThan']) }} kg.</span>
                                                                        </td>
                                                                        <td class="text-right">{{ $rule->points }}</td>
                                                                    </tr>
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

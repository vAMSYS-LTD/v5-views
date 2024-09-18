<div>
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Failure Rules</h4>
        </div>

        <div class="striped-table">
            <table class="text-left">
                <thead>
                <tr>
                    <th>Rule Name</th>
                    <th>Condition</th>
                    <th>PIREP Action</th>
                    <th>Your Intervention</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rejectRules as $rule)
                    <tr>
                        <td>{{ $rule->rule_name }}</td>
                        @php
                            $replacementText = [];
                            $rules = $rule->rule;
                            $terms = ['heavierThan', 'lighterThan', 'max', 'maxCoefficient'];

                            foreach ($terms as $term) {
                                if (isset($rules->$term)) {
                                    switch ($term) {
                                        case 'heavierThan':
                                            $replacementText[] =  $rule->rule->heavierThan.' FPM';
                                            break;
                                        case 'lighterThan':
                                            $replacementText[] = $rule->rule->lighterThan.' FPM';
                                            break;
                                        case 'max':
                                            $replacementText[] = $rule->rule->max;
                                            break;
                                        case 'maxCoefficient':
                                            $replacementText[] = 'or ' . $rule->rule->maxCoefficient*100-100 .'%';
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            }

                            $pilotDescription = str_replace('[condition_1]', implode(' ', $replacementText), $rule->parentRule->pilot_description);
                        @endphp
                        <td>
                            {{ $pilotDescription }}
                        </td>
                        <td>
                            @switch($rule->action)
                                @case('failed')
                                    Sent for Staff Review
                                @break
                                @case('rejected')
                                    Rejected
                                @break
                                @case('invalidated')
                                    Invalidated
                                @break
                            @endswitch
                        </td>
                        <td>{{ $rule->reply?'Required':'' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

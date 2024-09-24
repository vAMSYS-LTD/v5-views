<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">{{ $this->airlineName }} Activity Requirements Summary</h4>
    </div>

    <div class="card w-full overflow-auto">
        <div class="px-6 pb-6 pt-2 grid md:grid-cols-2 gap-2">
            <div class="flex flex-col space-y-2">
                <div>
                    <h5 class="text-sm">Required Activity:</h5>
                    @if($this->activityType == 'pireps')
                        <p class="text-sm">{{ $activityValue }} {{ \Illuminate\Support\Str::plural('PIREP', $activityValue) }} every {{ $activityPeriod }} {{ \Illuminate\Support\Str::plural('day', $activityPeriod) }}</p>
                    @else
                        <p class="text-sm">{{ $activityValue }} {{ \Illuminate\Support\Str::plural('hour', $activityValue) }} every {{ $activityPeriod }} {{ \Illuminate\Support\Str::plural('day', $activityPeriod) }}</p>
                    @endif
                </div>
            </div>
            <div>
                <h5 class="text-sm">Your Activity:</h5>
                @if($this->activityType == 'pireps')
                    <p class="text-sm">{{ $myActivityValue }} {{ \Illuminate\Support\Str::plural('PIREP', $myActivityValue) }} in the last {{ $activityPeriod }} {{ \Illuminate\Support\Str::plural('day', $activityPeriod) }}</p>
                @else
                    <p class="text-sm">{{ $myActivityValue }} {{ \Illuminate\Support\Str::plural('hour', $myActivityValue) }} in the last {{ $activityPeriod }} {{ \Illuminate\Support\Str::plural('day', $activityPeriod) }}</p>
                @endif
            </div>
            <div class="md:col-span-2">
                @if($meetingActivity)
                    You are meeting activity requirements.
                @else
                    You are not meeting activity requirements. Your Pilot Account will be removed on {{ $removalDate }}. @if($onWhitelist)  However, you are immune to activity requirements and no action will be taken. @endif
                @endif
            </div>
        </div>
    </div>
</div>

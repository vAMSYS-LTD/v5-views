<div class="card mb-4">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Data Log</h4>
        <div>
            All times are Zulu
        </div>
    </div>

    <div class="w-full overflow-auto">
        <div class="px-6 pb-6 pt-2 h-[328px]">
            <div class="space-y-2 pb-6">
                @foreach($this->pirep->log as $line)
                    <div class="flex flex-row">
                        @if($line->type == "landing_report_item" || $line->type == "landing_report_title")
                            <div class="text-justify">
                                {{ $line->message }}
                            </div>
                        @else
                            <div class="text-sm">
                                {{ $line->timestamp }}
                            </div>
                            <div class="ml-2 text-justify">
                                {{ $line->message }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

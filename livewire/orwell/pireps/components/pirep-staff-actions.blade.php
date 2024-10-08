<div>
    <div class="mb-2 bg-primary/10 text-primary border border-primary/20 text-sm rounded-md py-3 px-5 flex justify-between items-center">
        <div class="flex-grow flex justify-between">
            <p>
                <span class="font-bold">Staff on this PIREP:</span>@foreach($this->viewers as $viewer)
                    {{ $viewer['name'] }}@if(!$loop->last), @endif
                @endforeach
            </p>
            @if($pirepsToReview > 0)
            <p>
                <span class="font-bold">PIREPs to Review:</span> {{ $currentSequence }} of {{ $pirepsToReview }}
            </p>
            @endif
        </div>
        @if($pirepsToReview > 0 && $currentSequence != $pirepsToReview)
            <button wire:click="showNextPirep" class="text-xl/[0] ml-4" data-fc-dismiss="dismiss-example" type="button">
                Next PIREP <i class="fa-regular fa-caret-right"></i>
            </button>
        @endif
    </div>

    <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 mb-4">
        <div class="card h-full">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Actions</h4>
                <div>
                    {{ $this->extraActions() }}
                </div>
            </div>

            <div class="px-6 pb-6 pt-2 space-y-2">
                <div class="flex">
                    @if(in_array($pirep->status, ['failed', 'accepted', 'complete', 'rejected', 'invalidated']))
                        @if($pirep->status != 'failed')
                            <div class=" text-xs w-full text-center">
                                This PIREP has already been reviewed and has the status of {{ $pirep->status }}.
                            </div>
                        @endif
                        @if($pirep->need_reply)
                            <div class=" text-xs w-full text-center">
                                PIREP is waiting for a reply from the Pilot.
                            </div>
                        @endif
                    @else
                        <div class=" text-xs w-full text-center">
                            This PIREP is being processed.
                        </div>
                    @endif
                </div>
                @if(in_array($pirep->status, ['failed', 'accepted', 'complete', 'rejected', 'invalidated']))
                @if($pirep->pirep_data && isset($pirep->pirep_data->touchdowns) && count($pirep->pirep_data->touchdowns) > 1 && !isset($pirep->pirep_data->landing_selected))
                    <div class="flex">
                        <div class=" text-xs w-full text-center">
                            Multiple touchdowns detected. Please select one which will apply and PIREP will be scored
                            against.
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        @foreach($pirep->pirep_data->touchdowns as $touchdown)
                            <label class="flex items-center cursor-pointer">
                                <input wire:model.live="landingRate" type="radio" name="landing_rate"
                                       value="{{ $touchdown->rate }}" class="form-radio" />
                                <span class="text-white-dark ml-2">{{ $touchdown->rate }} FPM. Gear: {{ $touchdown->gear }}. Pitch: {{ $touchdown->pitch }}. Roll: {{ $touchdown->roll }}. {{ $touchdown->speed }} kts.</span>
                            </label>
                        @endforeach
                    </div>
                    @if($landingRate)
                        <div class="flex flex-col text-center">
                            <div wire:click="submitLandingRate" wire:loading.attr="disabled" class="w-full cursor-pointer btn btn-info hover:no-underline">
                                <span>Submit Landing Rate & Rescore</span>
                            </div>
                        </div>
                    @endif
                @else
                    @if($pirep->need_reply == false)
                        <div class="flex w-full">
                                <textarea wire:model.live="internalNote" rows="3" class="form-textarea"
                                          placeholder="You may leave an optional internal PIREP note for other staff to see with the action you are about to take."></textarea>
                        </div>
                        <div class="flex flex-col text-center">
                            <div>
                                {{ $this->acceptPirepAction }}
                            </div>
                        </div>
                        <div class="flex flex-col text-center">
                            <div>
                                {{ $this->rejectPirepAction }}
                            </div>
                        </div>
                        <div class="flex flex-col text-center">
                            <div>
                                {{ $this->invalidatePirepAction }}
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col text-center">
                        <div>
                            {{ $this->replyNeededPirepAction }}
                        </div>
                    </div>
                @endif
                @endif
                <div class="flex flex-col text-center">
                    <a class="w-full cursor-pointer btn btn-info hover:no-underline"
                       href="{{ route('orwell.pireps.list', ['tableFilters[username_filter][username]' => $pirep->pilot->username]) }}"
                       target="_blank"><span>PIREP List for Pilot</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Internal Pilot & PIREP Notes</h4>
                <div>
                    {{ $this->noteActions() }}
                </div>
            </div>

            <div class="card w-full overflow-auto">
                <div class="pt-2 h-[356px]">
                    <div class="space-y-2 divide-y pb-6">
                        @foreach($notes as $note)
                            @if($note->type == 'Pilot Note')
                                <div class="flex px-6 py-2 flex-col notam-unread">
                                    <div class="flex w-full justify-between text-xs mt-2">
                                        <div>
                                            {{ $note->created_by }}
                                        </div>
                                        <div wire:click="deletePilotNote({{ $note->id }})"
                                             class="ml-2 hover:underline cursor-pointer">
                                            Delete Note
                                        </div>
                                        <div>
                                            {{ $note->created_at->format('jS M y H:i\z') }}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex-none font-semibold pr-2">
                                            {{ $note->type }}
                                        </div>
                                        <div class="grow">
                                            {!! nl2br($note->message) !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex px-6 py-2 flex-col">
                                    <div class="flex w-full justify-between text-xs mt-2">
                                        <div>
                                            {{ $note->created_by }}
                                        </div>
                                        <div>
                                            {{ $note->created_at->format('jS M y H:i\z') }}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex-none font-semibold pr-2">
                                            {{ $note->type }}
                                        </div>
                                        <div class="grow">
                                            {!! nl2br($note->message) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">PIREP Comments</h4>
                <div>
                    {{ $this->addCommentAction }}
                </div>
            </div>

            <div class="card w-full overflow-auto">
                <div class="px-6 pb-6 pt-2 h-[356px]">
                    <div class="space-y-2 divide-y pb-6">
                        @foreach($comments as $comment)
                            <div class="flex flex-col">
                                <div class="flex w-full justify-between text-xs mt-2">
                                    <div>
                                        @if($comment->pilot)
                                            {{ $comment->pilot->user->full_name }}
                                        @else
                                            System
                                        @endif
                                    </div>
                                    @if($comment->pilot_id != $this->pirep->pilot_id)
                                        <div wire:click="deletePirepComment({{ $comment->id }})"
                                             class="ml-2 hover:underline cursor-pointer">
                                            Delete Comment
                                        </div>
                                    @endif
                                    <div>
                                        {{ $comment->created_at->format('jS M y H:i\z') }}
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="grow">
                                        {!! nl2br($comment->comment) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-filament-actions::modals />
</div>
@script
<script>
    Echo.join(`App.Pireps.` + {{ $this->pirepId }})
        .here(function (members) {
            // runs when you join
            console.table(members);
        })
        .joining(function (joiningMember, members) {
            // runs when another member joins
            console.table(joiningMember);
        })
        .leaving(function (leavingMember, members) {
            // runs when another member leaves
            console.table(leavingMember);
        });
</script>
@endscript

<div x-data="{ pirepReview: {{ $pirepReview }}, liveryReview: {{ $liveryReview }}, claimReview: {{ $claimReview }}, registrationReview: {{ $registrationReview }},
transferReview: {{ $transferReview }} }"
     x-show="pirepReview > 0 || liveryReview > 0 || claimReview > 0 || registrationReview > 0 || transferReview > 0">
    <div class="h-full p-5 card">
        <div class="flex items-center mb-2">
            <h5 class="font-semibold text-md">Your Attention Is Needed</h5>
        </div>
        <div class="relative">
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                @if($liveryReview > 0)
                    <a class="w-full cursor-pointer btn btn-warning relative inline-flex"
                       href="{{ route('orwell.pireps.liveryReview') }}"
                       wire:navigate>
                        Livery Review
                        <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-rose-500 text-white">
                           {{ $liveryReview }}
                        </span>
                    </a>
                @else
                    <a class="w-full cursor-pointer btn btn-success"><span>Livery Review</span>
                    </a>
                @endif

                @if($pirepReview > 0)
                    <a href="{{ route('orwell.pireps.review') }}" class="w-full cursor-pointer btn btn-warning relative inline-flex"><span>PIREP Review</span>
                        <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-rose-500 text-white">
                           {{ $pirepReview }}
                        </span>
                    </a>
                @else
                    <a class="w-full cursor-pointer btn btn-success"><span>PIREP Review</span></a>
                @endif

                @if($this->airline->enable_claims_system)
                    @if($claimReview > 0)
                        <a class="w-full cursor-pointer btn btn-warning relative inline-flex"><span>Claim Review</span>
                            <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-rose-500 text-white">
                               {{ $claimReview }}
                            </span>
                        </a>
                    @else
                        <a class="w-full cursor-pointer btn btn-success"><span>Claim Review</span>
                        </a>
                    @endif
                @endif

                @if($this->airline->enable_registration_review)
                    @if($registrationReview > 0)
                        <a class="w-full cursor-pointer btn btn-warning relative inline-flex"
                           href="{{ route('orwell.pilots.review') }}"><span>Registration Review</span>
                            <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-rose-500 text-white">
                               {{ $registrationReview }}
                            </span>
                        </a>
                    @else
                        <a class="w-full cursor-pointer btn btn-success"><span>Registration Review</span>
                        </a>
                    @endif
                @endif

                @if($this->airline->enable_transfers)
                    @if($transferReview > 0)
                        <a class="w-full cursor-pointer btn btn-warning relative inline-flex"
                           href="{{ route('orwell.pilots.transfer') }}"><span>Transfer Review</span>
                            <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-rose-500 text-white">
                               {{ $transferReview }}
                            </span>
                        </a>
                    @else
                        <a class="w-full cursor-pointer btn btn-success"><span>Transfer Review</span>
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

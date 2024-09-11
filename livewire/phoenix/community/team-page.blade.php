<div>
    <div class="card flex justify-between items-center">
        <h4 class="card-header">Meet Our Team</h4>
    </div>
    <div class="flex flex-wrap justify-around mt-4 gap-4">
        @foreach($staff as $member)
            <div class="card max-w-[20rem] w-full">
                @if($member->staff_image_url)
                    <div class="rounded-tl rounded-tr h-full overflow-hidden">
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($member->staff_image_url) }}" alt="{{ $member->full_name }}" class="w-full h-full object-cover" />
                    </div>
                @endif
                <div class="px-6 py-2">
                    <h5 class="text-[15px] font-semibold text-center">{{ $member->full_name }}</h5>
                    <p class="text-center">{{ $member->staff_title }}</p>
                    @if($member->staff_email)
                        <p class="text-center">{{ $member->staff_email }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

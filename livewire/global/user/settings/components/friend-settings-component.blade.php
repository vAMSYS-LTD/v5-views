<div>
    <form class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md mb-5" wire:submit="sendFriendRequest">
        <h6 class="text-lg pt-4 px-4 font-bold mb-5">Send Friend Request</h6>
        <div class="flex px-4 mb-5 flex-col sm:flex-row">
            <div class="flex-1 grid grid-cols-1">
                <div>
                    <label for="email">Email</label>
                    <input required wire:model.live="email" id="email" type="email" class="form-input" />
                    @error('email')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
        <div class="w-full">
            <button type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Send</button>
        </div>
    </form>

    @if($currentFriends->count() > 0)
    <div class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md mb-4 shadow-lg">
        <h6 class="text-lg pt-4 px-4 font-bold mb-5">Your Friends</h6>
        <div class="flex flex-wrap justify-around my-4 gap-4">
            @foreach($currentFriends as $friend)
                <div class="max-w-[20rem] w-full bg-[#3b3f5c] shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                    <div class="py-7 px-6">
                        <h5 class="text-white text-[15px] font-semibold text-center">{{ $friend->full_name }}</h5>
                        <div class="relative w-full mt-4 inline-flex align-middle">
                            <button wire:key="{{ $friend->id.'rej' }}" wire:click="unfriend({{ $friend->id }})" type="button" class="btn w-full btn-primary">Unfriend</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($incomingFriends->count() > 0)
    <div class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md mb-4 shadow-lg">
        <h6 class="text-lg pt-4 px-4 font-bold mb-5">Incoming Requests</h6>
        <div class="flex flex-wrap justify-around my-4 gap-4">
            @foreach($incomingFriends as $friend)
                <div class="max-w-[20rem] w-full bg-[#3b3f5c] shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                    <div class="pt-7 mb-4 px-6">
                        <h5 class="text-white text-[15px] font-semibold text-center">{{ $friend->full_name }}</h5>
                        <div class="relative w-full mt-4 inline-flex align-middle">
                            <button wire:key="{{ $friend->id.'acc' }}" wire:click="acceptIncomingRequest({{ $friend->id }})" type="button" class="btn w-full btn-primary ltr:rounded-r-none rtl:rounded-l-none">Accept</button>
                            <button wire:key="{{ $friend->id.'rej' }}" wire:click="rejectIncomingRequest({{ $friend->id }})" type="button" class="btn w-full btn-primary ltr:rounded-l-none rtl:rounded-r-none">Reject</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($outgoingFriends->count() > 0)
    <div class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md mb-4 shadow-lg">
        <h6 class="text-lg pt-4 px-4 font-bold mb-5">Outgoing Requests</h6>
        <div class="flex flex-wrap justify-around my-4 gap-4">

            @foreach($outgoingFriends as $friend)
                <div class="max-w-[20rem] w-full bg-[#3b3f5c] shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                    <div class="py-7 px-6">
                        <h5 class="text-white text-[15px] font-semibold text-center">{{ $friend->full_name }}</h5>
                        <div class="relative w-full mt-4 inline-flex align-middle">
                            <button wire:key="{{ $friend->id.'rej' }}" wire:click="unfriend({{ $friend->id }})" type="button" class="btn w-full btn-primary">Cancel</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>


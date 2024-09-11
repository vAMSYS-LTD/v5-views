<form class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md" wire:submit="save">
    <h6 class="text-lg pt-4 px-4 font-bold mb-5">Social, Network & Third-Party Integration Settings</h6>

    <div class="flex px-4 mb-5 flex-col sm:flex-row">
        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="discordState">Discord Status</label>
                @if($this->dState)
                    <div class="flex">
                        <div class="ltr:mr-3 rtl:ml-3">
                            <img src="{{ $this->dUser->avatar }}" alt="image" class="rounded-full w-12 h-12 object-cover" />
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-1 text-base">{{ $this->dUser->name }}</h6>
                                <p class="text-xs">{{ $this->dUser->discord_id }}</p>
                            </div>
                            <div>
                                <button id="discordUnlinkState" type="button" wire:click="discordUnlink" class="btn btn-danger mt-1"><i class="fab fa-discord mr-2"></i> Unlink Account</button>
                            </div>
                        </div>
                    </div>
                @else
                    <button id="discordLinkState" type="button" wire:click="discordLink" class="btn btn-primary mt-1"><i class="fab fa-discord mr-2"></i> Link Account</button>
                @endif
            </div>
        </div>
    </div>

    @if(count($this->dGuilds) > 0)
        <div class="flex px-4 mb-5 flex-col sm:flex-row">
            <div class="flex-1 grid grid-cols-1 sm:grid-cols-3 gap-5">
                @foreach($this->dGuilds as $guild)
                    <div>
                        <div class="flex mr-2">
                            <div>
                                <img src="{{ $guild->server_icon }}" alt="image" class="rounded-full w-12 h-12 object-cover" />
                            </div>
                            <div class="flex-1 w-full space-x-4 ml-2">
                                <div class="flex-1 font-semibold">
                                    <h6 class="mb-1 text-base">{{ $guild->airline['name'] }}</h6>
                                    <p class="text-xs">{{ $guild->server_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if($guild->member)
                                <button type="button" disabled class="btn btn-primary btn-sm w-full"><i class="fab fa-discord mr-2"></i> Member</button>
                            @else
                                <button id="discordJoinState" type="button" wire:click="discordJoin({{ $guild->airline['id'] }})" class="btn btn-info btn-sm w-full"><i class="fab fa-discord mr-2"></i> Join Server</button>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <div class="flex px-4 mb-5 flex-col sm:flex-row">
        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="simbriefUsername">SimBrief Alias (Username)</label>
                <input wire:model.live="sbUsername" id="simbriefUsername" type="text" class="form-input" />
                @error('sbUsername')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="twitchName">Twitch Username</label>
                <input wire:model.live="twUsername" id="twitchName" type="text" class="form-input" />
                @error('twUsername')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="youtubeUsername">Youtube Username</label>
                <input wire:model.live="ytUsername" id="youtubeUsername" type="text" class="form-input" />
                @error('ytUsername')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="ivaoId">IVAO VID</label>
                <input wire:model.live="ivaoId" id="ivaoId" type="text" class="form-input" />
                @error('ivaoId')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="vatsimId">VATSIM CID</label>
                <input wire:model.live="vatsimId" id="vatsimId" type="text" class="form-input" />
                @error('vatsimId')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="posonId">POSCON ID</label>
                <input wire:model.live="posconId" id="posonId" type="text" class="form-input" />
                @error('posconId')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>
    <div class="w-full">
        <button type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Save</button>
    </div>
</form>

<form
    class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md" wire:submit="save">
    <h6 class="text-lg pt-4 px-4 font-bold mb-5">Password Change</h6>
    <div class="grid px-4 mb-5 grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="flex">
            <input wire:model.live="oldPassword" id="oldPassword" type="password" placeholder="Current Password" class="form-input" />
            @error('oldPassword')<p class="text-danger mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex">
            <input wire:model.live="newPassword" id="newPassword" type="password" placeholder="New Password" class="form-input" />
            @error('newPassword')<p class="text-danger mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex">
            <input wire:model.live="newPassword_confirmation" id="newPassword_confirmation" type="password" placeholder="Confirm New Password" class="form-input" />
            @error('newPassword_confirmation')<p class="text-danger mt-1">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="w-full">
        <button type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Save</button>
    </div>
</form>

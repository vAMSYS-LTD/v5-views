<form class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md" wire:submit="submit">
    <h6 class="text-lg pt-4 px-4 font-bold mb-5">General Settings</h6>
    <div class="flex mx-4 mb-5 items-center border p-2 rounded border-danger">
        <span class="ltr:pr-2 rtl:pl-2">
            <strong class="ltr:mr-2 rtl:ml-2">All changes are closely monitored.</strong> Using fake names is strictly prohibited under vAMSYS Terms of Service. Any engagement in suspicious activity may result in permanent account removal with no chance of reinstatement.
        </span>
    </div>

    @if($user->name_accepted === false)
        <div class="flex mx-4 mb-5 items-center border p-2 rounded border-danger">
        <span class="ltr:pr-2 rtl:pl-2">
            <strong class="ltr:mr-2 rtl:ml-2">Your Name needs Updating!</strong> After review, Team vAMSYS believes you are not using your real name, your full name or similar - which is against vAMSYS Terms of Service. Please update your name.
        </span>
        </div>
    @endif

    <div class="flex px-4 mb-5 flex-col sm:flex-row">
        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="firstName">First Name</label>
                <input wire:model.live="firstName" id="firstName" type="text" class="form-input" />
                @error('firstName')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input wire:model.live="lastName" id="lastName" type="text" class="form-input" />
                @error('lastName')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input wire:model.live="email" id="email" type="email" class="form-input" />
                @error('email')<p class="text-danger mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="forumName">Name Display</label>
                <select wire:model.live="invisionName" id="forumName" class="form-select">
                    <option value="full">{{ $user->name }}</option>
                    <option value="first_initial">{{ $user->first_name }} {{ mb_substr($user->last_name, 0, 1) }}.</option>
                    <option value="first">{{ $user->first_name }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="w-full">
        <button type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Save</button>
    </div>
</form>

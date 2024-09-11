<div>
    @if($user->privacy_enable_profile)
        <form wire:submit.prevent="create">
            <div class="panel rounded-none rounded-t-md mt-4" x-data="{ open: false }">
                <div class="items-center cursor-pointer" @click="open = !open">
                    <div class="text-lg font-semibold flex justify-between items-center">
                        Profile Settings
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="none" class="h-5 w-5 transform transition-transform duration-200" :class="{ 'rotate-180': open }">

                            <path fill="currentColor" d="M256 417.9l17-17L465 209l17-17L448 158.1l-17 17-175 175L81 175l-17-17L30.1 192l17 17L239 401l17 17z"/></svg>
                    </div>
                </div>

                <div x-show="open" class="mt-4 transition duration-200">
                    {{ $this->form }}
                </div>
            </div>

            <button wire:dirty type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Save</button>
            <x-filament-actions::modals />
        </form>

    @else
        <div class="panel mt-4">
            <div class="mb-5 items-center dark:text-white-light">
                <div class="text-lg font-semibold">Profile Settings</div>
            </div>
            <div>
                Your Profile is private. Only you can see this.
            </div>
            <div>
                <a href="/user/settings#preferences">To make it public again, please click here and change it in your
                    User
                    settings.</a>
            </div>
        </div>
    @endif
</div>


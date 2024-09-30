
    <div data-fc-type="tab">
        <nav class="flex flex-wrap space-x-2 bg-light dark:bg-gray-700/60 mb-6" aria-label="Tabs" role="tablist">
            <button type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white flex-auto py-2 px-4 inline-flex justify-center items-center gap-2 bg-transparent text-center text-sm font-semibold text-gray-500 hover:text-primary dark:hover:text-gray-400 first:rounded-s-md last:rounded-e-md active" data-fc-target="#fill-and-justify-1" aria-controls="fill-and-justify-1" role="tab">
                General Settings
            </button>
            <button type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white flex-auto py-2 px-4 inline-flex justify-center items-center gap-2 bg-transparent text-center text-sm font-semibold text-gray-500 hover:text-primary dark:hover:text-gray-400 first:rounded-s-md last:rounded-e-md" data-fc-target="#fill-and-justify-2" aria-controls="fill-and-justify-2" role="tab">
                Preferences
            </button>
            <button type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white flex-auto py-2 px-4 inline-flex justify-center items-center gap-2 bg-transparent text-center text-sm font-semibold text-gray-500 hover:text-primary dark:hover:text-gray-400 first:rounded-s-md last:rounded-e-md" data-fc-target="#fill-and-justify-3" aria-controls="fill-and-justify-3" role="tab">
                Friends
            </button>
            <button type="button" class="fc-tab-active:bg-primary fc-tab-active:text-white flex-auto py-2 px-4 inline-flex justify-center items-center gap-2 bg-transparent text-center text-sm font-semibold text-gray-500 hover:text-primary dark:hover:text-gray-400 first:rounded-s-md last:rounded-e-md" data-fc-target="#fill-and-justify-4" aria-controls="fill-and-justify-4" role="tab">
                Danger Zone
            </button>
        </nav>

        <div class="mt-3">
            <div id="fill-and-justify-1" role="tabpanel" aria-labelledby="fill-and-justify-item-1" class="flex flex-col space-y-4">
                <livewire:global.user.settings.components.general-settings-component :user="$user" />
{{--                <livewire:global.user.settings.components.social-settings-component :user="$user" />--}}
                <livewire:global.user.settings.components.two-factor-settings-component :$user />
                <livewire:global.user.settings.components.password-settings-component :user="$user" />
            </div>

            <div id="fill-and-justify-2" class="hidden" role="tabpanel" aria-labelledby="fill-and-justify-item-2">
                <livewire:global.user.settings.components.privacy-settings-component :user="$user" />
            </div>

            <div id="fill-and-justify-3" class="hidden" role="tabpanel" aria-labelledby="fill-and-justify-item-3">
                <livewire:global.user.settings.components.friend-settings-component :user="$user" />
            </div>

            <div id="fill-and-justify-4" class="hidden" role="tabpanel" aria-labelledby="fill-and-justify-item-4">
                <livewire:global.user.settings.logic.freeze-account :user="$user" />
                <livewire:global.user.settings.logic.account-merge :user="$user" />
            </div>
        </div>
    </div>


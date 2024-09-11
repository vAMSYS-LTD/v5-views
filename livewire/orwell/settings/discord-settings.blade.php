<div>
    <div>
        <div class="card">
            <div class="flex items-center justify-between py-2 dark:text-white-light">
                <h5 class="font-semibold text-md">What is vAMSYS Discord Bot and what does it do?</h5>
            </div>
            WIP
        </div>
    </div>
    @if(!$this->botPresent)
        <div class="mt-4">
            <div class="card">
                <div class="flex items-center justify-between py-2 dark:text-white-light">
                    <h5 class="font-semibold text-md">Inviting vAMSYS Bot to your Discord Server</h5>
                </div>
                <div>
                    For our Discord functionality to work, your Discord server must have vAMSYS Robot.
                </div>
                <div>
                    It is a privileged user and should have access to your channels.
                </div>
                <div class="flex flex-row space-x-4 mt-4">
                    <div class="flex-1">
                        <h5 class="font-bold mb-2">Step 1</h5>
                        <div>
                            Add our Bot to your Discord Server
                        </div>
                        <div class="">
                            <a href="https://discord.com/api/oauth2/authorize?client_id=257495037619863552&permissions=8&scope=bot" target="_blank" class="btn btn-primary mt-2 w-full"><i class="fab fa-discord mr-2"></i> Invite Bot</a>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h5 class="font-bold mb-2">Step 2</h5>
                        <div>
                            In one of your Discod Channels type this command:
                        </div>
                        <div class="mt-2 relative flex items-center border p-2 rounded text-dark bg-dark-light border-dark dark:bg-dark-dark-light dark:text-white-light dark:border-white-light/20">
                        <span class="ltr:pr-2 rtl:pl-2">
                            /setup {{ $settings->setup_token }}
                        </span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h5 class="font-bold mb-2">Step 3</h5>
                        <div>
                            Click this button to check connection
                        </div>
                        <div class="">
                            <button wire:click="verifyConnection(true)" type="button" class="btn btn-primary mt-2 w-full">Check Connection</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <button type="submit" wire:loading.attr="disabled" wire:click="verifyConnection(true)" class="mt-4 btn btn-primary w-full">
            Refresh Channels
        </button>
    @endif

    <form wire:submit="create" class="card mt-4">
        {{ $this->form }}

        <button wire:loading.attr="disabled"  type="submit" class="mt-4 btn btn-success w-full">
            Save
        </button>
    </form>

    <x-filament-actions::modals />
</div>

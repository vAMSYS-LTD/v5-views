<div class="flex flex-col space-y-4">
    <div class="card">
        <a href="https://docs.vamsys.dev/settings/discord" target="_blank">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">What is vAMSYS Discord Bot and what does it do? Click me to find out</h4>
            </div>
        </a>
    </div>

{{--    <x-alerts.danger title="Not Ready For Use" content="You are welcome to invite the Discord Bot to your server - but it is too early to start using it for role assignment. You can, however, set up notifications - they will not work fully until after v5 launch."/>--}}

    @if(!$this->botPresent)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Inviting vAMSYS Bot to your Discord Server</h4>
            </div>
            <div class="px-6 py-2 space-y-2">
                <div class="grid md:grid-cols-3 gap-2">
                    <div class="flex flex-col h-full justify-between">
                        <h5 class="font-bold mb-2">Step 1</h5>
                        <div>
                            Add our Bot to your Discord Server. Should be done by Discord Owner.
                        </div>
                        <div class="">
                            <a href="https://discord.com/api/oauth2/authorize?client_id=1284445849878921277&permissions=8&scope=bot" target="_blank" class="btn btn-primary mt-2 w-full"><i class="fab fa-discord mr-2"></i> Invite Bot</a>
                        </div>
                    </div>

                    <div class="flex flex-col h-full justify-between">
                        <h5 class="font-bold mb-2">Step 2</h5>
                        <div>
                            In any Discord Channel, invoke <span class="border border-2 p-1">/setup</span> command and enter this token:
                        </div>
                        <div class="mt-2 relative flex items-center border p-2 rounded text-dark bg-dark-light border-dark dark:bg-dark-dark-light dark:text-white-light dark:border-white-light/20">
                            <span class="ltr:pr-2 rtl:pl-2">
                                {{ $settings->setup_token }}
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col h-full justify-between">
                        <h5 class="font-bold mb-2">Step 3</h5>
                        <div>
                            Click this button to check connection.
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
            Refresh Channels & Roles
        </button>
    @endif

    <form wire:submit="create">

        {{ $this->form }}


        <button wire:loading.attr="disabled"  type="submit" class="mt-4 btn btn-success w-full">
            Save
        </button>
    </form>

    <x-filament-actions::modals />
</div>

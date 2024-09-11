<div>
    {{ $this->table }}

    <form wire:submit="copy">
        <div class="card mt-4 rounded-b-none">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Copy Scorers from Group to Group</h4>
            </div>

            <div class="px-6 py-2 space-y-2">
                {{ $this->form }}
            </div>
            @if($this->origin && $this->destination)
                <div class="relative flex items-center border p-3.5
             after:inline-block after:absolute after:top-1/2 ltr:after:right-0 rtl:after:left-0 rtl:after:rotate-180 after:-mt-2 after:border-r-8 after:border-t-8 after:border-b-8 after:border-t-transparent after:border-b-transparent after:border-r-inherit
             before:absolute before:top-1/2 ltr:before:left-0 rtl:before:right-0 rtl:before:rotate-180 before:-mt-2 before:border-l-8 before:border-t-8 before:border-b-8 before:border-t-transparent before:border-b-transparent before:border-l-inherit text-danger bg-danger-light border-danger border-l-[64px] border-r-[64px] dark:bg-danger-dark-light">
                <span class="absolute ltr:-left-11 rtl:-right-11 inset-y-0 text-white w-6 h-6 m-auto">
                    <x-icon name="light.circle-exclamation" />
                </span>
                <span class="w-full text-center ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 text-lg tracking-widest rtl:ml-1">Think before your click!</strong>This is a destructive action. Existing scoring rules at the 'TO' Scoring Group will be permanently removed before 'FROM' rules are copied over. Action cannot be reversed.</span>
                <span class="absolute ltr:-right-11 rtl:-left-11 inset-y-0 text-white w-6 h-6 m-auto">
                    <x-icon name="light.circle-exclamation" />
                </span>
                </div>

                <button type="submit" class="rounded-none rounded-b-lg btn btn-danger w-full">
                    Copy
                </button>
            @endif
        </div>
    </form>

    <x-filament-actions::modals />
</div>

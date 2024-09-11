<div>

    <div
        class="mb-4 relative flex items-center border p-3.5 rounded before:inline-block before:absolute before:top-1/2 ltr:before:right-0 rtl:before:left-0 rtl:before:rotate-180 before:-mt-2 before:border-r-8 before:border-t-8 before:border-b-8 before:border-t-transparent before:border-b-transparent before:border-r-inherit text-danger bg-danger-light border-danger ltr:border-r-[64px] rtl:border-l-[64px] dark:bg-danger-dark-light">
    <span class="absolute ltr:-right-11 rtl:-left-11 inset-y-0 text-white w-6 h-6 m-auto">
        <x-icon name="light.circle-exclamation" />
    </span>
        <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">v3 Compatibility Warning!</strong>Do not create or edit Rules involving time entry. In v5 time is now stored in hh:mm:ss. Creating or Editing any such rules will break your v3 rules and all PIREP processing for your VA.</span>
    </div>

    {{ $this->table }}

    <x-filament-actions::modals />
</div>

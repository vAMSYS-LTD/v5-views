<div>
    <div class="mb-4">
        <div class="flex-1 text-sm">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                    <div class="flex justify-between mb-2">
                        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Active Airlines</h6>
                        <span class="text-xs my-auto"></span>
                    </div>
                    <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                        <div class="flex w-full gap-4">
                            <div @mouseenter="$popovers('Active')" data-trigger="mouseenter" class="font-bold text-xl text-success mx-auto">{{ number_format($activeAirlines) }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                    <div class="flex justify-between mb-2">
                        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Overdue Subscriptions</h6>
                        <span class="text-xs my-auto"></span>
                    </div>
                    <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                        <div class="flex w-full gap-4">
                            <div @mouseenter="$popovers('Overdue')" data-trigger="mouseenter" class="font-bold text-xl text-danger mx-auto">{{ number_format($overdueAirline) }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                    <div class="flex justify-between mb-2">
                        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Airlines under Trial</h6>
                        <span class="text-xs my-auto"></span>
                    </div>
                    <div class="flex items-center justify-start -space-x-3 rtl:space-x-reverse">
                        <div class="flex w-full gap-4">
                            <div @mouseenter="$popovers('Trial')" data-trigger="mouseenter" class="font-bold text-xl text-primary mx-auto">{{ number_format($trialAirlines) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

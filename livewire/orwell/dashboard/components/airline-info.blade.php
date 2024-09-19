<div data-fc-type="tab">

    <nav class="relative z-0 flex border rounded-t-md overflow-hidden dark:border-gray-600 tablist" aria-label="Tabs" role="tablist">
        <button data-fc-target="#bar-with-underline-1" type="button" class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-2 px-2 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400 active" id="bar-with-underline-item-1" aria-controls="bar-with-underline-1" role="tab">
            Your Links & Info
        </button> <!-- button-end -->
        <button data-fc-target="#bar-with-underline-2" type="button" class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-2 px-2 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400" id="bar-with-underline-item-2" aria-controls="bar-with-underline-2" role="tab">
            Support
        </button> <!-- button-end -->
        <button data-fc-target="#bar-with-underline-3" type="button" class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-2 px-2 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400" id="bar-with-underline-item-2" aria-controls="bar-with-underline-3" role="tab">
            JSON Data
        </button> <!-- button-end -->
    </nav> <!-- nav-end -->

    <div class="mt-0 dark:mt-2">
        <div class="card rounded-none rounded-b-md dark:rounded-md p-4 flex flex-col sm:flex-row justify-between" id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
            <div>
                <h5 class="text-sm mb-1.5">Virtual Airline (VA) Identifier</h5>
                <p class="text-sm">{{ $airline->identifier }}</p>
            </div>
            @if($airline->launched)
                <div>
                    <h5 class="text-sm mb-1.5">Your Login Link</h5>
                    <p class="text-sm">{{ new \Illuminate\Support\HtmlString("https://vamsys.io/<wbr />login/<wbr />".$this->airline->register_slug) }}</p>
                </div>
                <div>
                    <h5 class="text-sm mb-1.5">Your Register Link</h5>
                    <p class="text-sm">{{ new \Illuminate\Support\HtmlString("https://vamsys.io/<wbr />register/<wbr />".$this->airline->register_slug) }}</p>
                </div>
            @endif
            <div>
                <h5 class="text-sm mb-1.5">AIRAC Cycle in Use</h5>
                <p class="text-sm">{{ $airline->airac }}</p>
            </div>
        </div> <!-- bar-with-underline-1 end -->

        <div id="bar-with-underline-2" class="card rounded-none rounded-b-md px-4 pt-4 pb-2 columns-1 md:columns-3 sm:columns-2 justify-between hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
            <div class="mb-2">
                <a href="https://discord.gg/aAVfmwcx56" target="_blank" class="flex space-x-2">
                    <x-icon name="brands.discord" class="w-4 h-4"/>
                    <span class="text-sm">Discord - Owner and Staff Discord</span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.heart-pulse" class="w-4 h-4"/>
                    <span class="text-sm">Changelog & Developer Portal</span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://docs.vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.book-open-cover" class="w-4 h-4"/>
                    <span class="text-sm">Manual - System Docs </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://protocol.vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.book-open-cover" class="w-4 h-4"/>
                    <span class="text-sm">Protocol - API Docs </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://vamsys.vision/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.comments" class="w-4 h-4"/>
                    <span class="text-sm">Vision - Bug Reports & Suggestions </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://help.vamsys.co.uk/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.messages-question" class="w-4 h-4"/>
                    <span class="text-sm">Helpdesk</span>
                </a>
            </div>
        </div>

        <div class="card rounded-none rounded-b-md dark:rounded-md p-4 flex flex-col sm:flex-row justify-between hidden" id="bar-with-underline-3" role="tabpanel" aria-labelledby="bar-with-underline-item-3">
            <div>
                <h5 class="text-sm mb-1.5">Airline Statistics JSON</h5>
                <p class="text-sm"><a href="{{ route('api.airline.statistics', ['airline' => $airline->public_key]) }}" target="_blank">Available Here</a></p>
            </div>

            <div>
                <h5 class="text-sm mb-1.5">Flight Map and Live Flights JSON</h5>
                <p class="text-sm">To be retired on 22nd Nov 2024. <a href="{{ route('api.airline.statistics.flight', ['airline' => $airline->public_key]) }}" target="_blank">Available Here</a></p>
            </div>
        </div>
    </div>

</div> <!-- tab-end -->

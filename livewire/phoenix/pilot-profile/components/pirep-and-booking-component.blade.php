@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
    $tabs = ['pirep',  'comments', 'booking',];

    $tabNames = [
        'pirep' => 'PIREPs',
        'comments' => 'PIREP Comments',
        'booking' => 'Bookings'
    ];

    $activeTab = 'pirep'; // Default active tab
@endphp

<div class="w-full">
    <div data-fc-type="tab">
        <nav class="relative z-0 flex flex-col sm:flex-row border rounded-md overflow-hidden dark:border-gray-600 tablist" aria-label="Tabs" role="tablist">
            @foreach ($tabs as $index => $tabKey)
                <button
                    data-fc-target="#{{ $tabKey }}"
                    type="button"
                    class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-2 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400
                @if($tabKey === $activeTab) active @endif"
                    id="bar-with-underline-item-{{ $index + 1 }}"
                    aria-controls="{{ $tabKey }}"
                    role="tab"
                >
                    {{ $tabNames[$tabKey] }}
                </button>
            @endforeach
        </nav>

        <div class="mt-2">
            @foreach ($tabs as $index => $tabKey)
                <div id="{{ $tabKey }}" class="@if($tabKey !== $activeTab) hidden @endif" role="tabpanel" aria-labelledby="bar-with-underline-item-{{ $index + 1 }}">
                    @if($tabKey == 'pirep')
                        <livewire:phoenix.pilot-profile.components.pirep-table :$profilePilotId />
                    @elseif($tabKey == 'booking')
                        <livewire:phoenix.pilot-profile.components.booking-table :$profilePilotId />
                    @elseif($tabKey == 'comments')
                        <livewire:phoenix.pilot-profile.components.pirep-comments-table :$profilePilotId />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

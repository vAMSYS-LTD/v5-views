<div>
    @if($currentEvents->count() > 0)
        <div
            class="mt-4 grid gap-4 {{ $currentEvents->count() >= 4 ? 'xl:grid-cols-4' : ($currentEvents->count() == 3 ? 'xl:grid-cols-3' : ($currentEvents->count() == 2 ? 'xl:grid-cols-2' : '')) }}">
            @foreach($currentEvents as $currentEvent)
                <div
                    class="w-full h-full mb-4 card hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer {{ $currentEvent->registrations->contains(fn ($value, $key) => $value->pilot_id == $pilot->id ) ? 'bg-gray-100 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' }} "
                    wire:click="open({{ $currentEvent->id }})">
                    <div class="py-4 h-full flex flex-col justify-between px-6">
                        <div class="relative -mt-7 mb-2 -mx-6 rounded-t overflow-hidden">
                            @if($currentEvent->tag)
                                <span
                                    class="absolute top-0 right-0 badge badge-primary">{{ $currentEvent->tag }}</span>
                            @endif
                            @if($currentEvent->event_image)
                                <img src="{{ $currentEvent->event_image }}" alt="{{ $currentEvent->name }}"
                                     class="w-full h-full object-cover" />
                            @endif
                        </div>
                        <div class="flex flex-col justify-between">
                            <div class="text-xs font-bold">
                                @if($currentEvent->open_registrations_at && $currentEvent->open_registrations_at->greaterThan(\Carbon\Carbon::now()))
                                    Registrations start
                                    on {{ $currentEvent->open_registrations_at->format('jS \o\f F \a\t H:m') }}
                                @else
                                    @if($currentEvent->event_starts_at->diffInDays($currentEvent->event_ends_at) > 1)
                                        {{ $currentEvent->event_starts_at->format('jS \o\f F') }}
                                        to {{ $currentEvent->event_ends_at->format('jS \o\f F') }}
                                    @else
                                        {{ $currentEvent->event_starts_at->format('jS \o\f F') }}
                                    @endif
                                @endif
                            </div>
                            <div
                                class="h-full mb-4 content-center text-[15px] font-bold {{ $currentEvent->registrations->contains(fn ($value, $key) => $value->pilot_id == $pilot->id) ? '' : 'dark:text-white-light' }} ">
                                {{ $currentEvent->name }}
                            </div>

                            <hr class="divider"/>

                            <div class="flex w-full justify-between font-semibold">
                                <div class="flex items-center ltr:mr-3 rtl:ml-3">
                                    @if($currentEvent->open_registrations_at)
                                        Registrations: {{ $currentEvent->registrations->count() }}
                                    @else
                                        Open to Everyone
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    Points: {{ $currentEvent->points }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

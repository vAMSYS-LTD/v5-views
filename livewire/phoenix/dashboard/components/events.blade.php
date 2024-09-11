<div wire:ignore class="{{ $componentWidth }}" style="{{ $events->count() > 0 ? '' : 'display: contents'}}">
@if($events->count() > 0)
        <div class="relative swiper event-image-swiper rounded w-full shadow">
            <div class="swiper-wrapper">
                @foreach($events as $event)
                <a class="swiper-slide" target="_blank" href="{{ route('phoenix.event', ['event' => $event->id]) }}">
                    @if($event->tag)
                        <span
                            class="absolute top-0 right-0 badge bg-primary py-1.5 px-2 dark:bg-primary text-white">{{ $event->tag }}</span>
                    @endif
                        <img
                            src="{{ $event->event_image }}" alt="{{ $event->name }}"
                            class="block w-full rounded" />
                </a>
                @endforeach
            </div>
            <div class="swiper-pagination dynamic-pagination"></div>
        </div>
@endif
</div>

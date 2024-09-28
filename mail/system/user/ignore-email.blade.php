<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/login/'.$airline->register_slug">
<img src="{{ $design->logo_select_bright_image }}" class="logo" alt="{{ $airline->name }}" data-auto-embed>
</x-mail::header>
</x-slot:header>

{{-- Body --}}
Dear {{ $user->first_name }},

Please ignore the email you received about not meeting activity requirements. It has been sent in error.

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
{{--© {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}--}}
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>

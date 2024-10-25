<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="https://vamsys.io/assets/images/logo/vAMSYS-dark-logo.png" class="logo" alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $user->first_name }},

Trial for your VA {{ $airline->identifier }} has expired and the VA has been removed.

@if($reason)
The following reason has been provided:
<x-mail::panel>
{{ $reason }}
</x-mail::panel>
@endif

Thank you for trying vAMSYS.

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
Do not reply to this e-mail, this mailbox is not monitored.<br />
<a href="https://vamsys.co.uk" target="_blank">vAMSYS</a>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>

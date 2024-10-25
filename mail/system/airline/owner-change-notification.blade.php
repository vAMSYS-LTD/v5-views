<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="https://vamsys.io/assets/images/logo/vAMSYS-dark-logo.png" class="logo" alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $recipient->first_name }},

This short message is to inform you that {{ $airline->name }} / {{ $airline->identifier }} has been set a new Owner:

{{ $newOwner->full_name }}

@if($recipient->id == $newOwner->id)
Please check and update billing details at Orwell -> Billing with no delay.
@endif

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

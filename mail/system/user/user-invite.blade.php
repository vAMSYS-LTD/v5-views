<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="{{ $message->embed(asset('/assets/images/logo/vAMSYS-dark-logo.png')) }}" class="logo"
alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $user->first_name }},

{{ $airline->name }} has made a vAMSYS account for you and added you to their Virtual Airline.


Please find your login details:

Email: Your email address.

Password: {{ $password }}

Upon logging in, we strongly advise you to change the password.

<x-mail::button :url="'https://vamsys.io/login/'.$airline->register_slug">
    Head to vAMSYS
</x-mail::button>

If you did not request this, please forward this email to hello@vamsys.co.uk for us to investigate and inform the sending party of their error.

## Anything else?
Check your inbox for additional e-mail with more information from the virtual airline.

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

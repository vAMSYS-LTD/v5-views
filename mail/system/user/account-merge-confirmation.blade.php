<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="{{ $message->embed(asset('/assets/images/logo/vAMSYS-dark-logo.png')) }}" class="logo"
alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $user->first_name }},

Someone (hopefully you!) submitted an account merge request - this will combine account registered under this email
with the other account and make it primary account, deleting this one.

If you did not request this, ignore this e-mail.

Click the button below to approve the request and merge this secondary user account into your main one.

<x-mail::button :url="route('general.merge.approve', ['token' => $token])">
Approve Merge Request
</x-mail::button>
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

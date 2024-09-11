<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="{{ $message->embed(asset('/assets/images/logo/vAMSYS-dark-logo.png')) }}" class="logo" alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $user->first_name }},

Please find the pilot removal digest for the period {{ $start }} to {{ $end }}.

In total, {{ count($removedPilots) }} {{ \Illuminate\Support\Str::plural('pilot', count($removedPilots)) }} {{ count($removedPilots) == 1?'has':'have' }} been removed in this period.
@if (count($removedPilots) > 0)
<x-mail::table>
| Pilot ID | Pilot Name | Removed At | Permanently Removed? |
|:--------:|:----------:|:----------:|:--------------------:|
@foreach ($removedPilots as $pilot)
| {{ $pilot->username }} | {{ $pilot->user->name }} | {{ date_create($pilot->deleted_at)->format('H:i:s') }} | {{ $pilot->permanent_remove ? 'Yes' : 'No' }} |
@endforeach
</x-mail::table>
@endif

Thank you for using vAMSYS.

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
To unsubscribe from this email, disable the removed pilots digest in Airline Management.<br/>
Do not reply to this e-mail, this mailbox is not monitored.<br/>
<a href="https://vamsys.co.uk" target="_blank">vAMSYS</a>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>

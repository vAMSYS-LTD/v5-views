<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="'https://vamsys.io/'">
<img src="https://vamsys.io/assets/images/logo/vAMSYS-dark-logo.png" class="logo" alt="vAMSYS">
</x-mail::header>
</x-slot:header>

Hi {{ $user->first_name }},

Welcome to vAMSYS! We’re excited to let you know that your Virtual Airline, "{{ $airline->name }}", has been successfully created and is ready for you to start setting up.

If you already have a vAMSYS user account, you can log in and begin working on your Virtual Airline right away.

If you're a new user, you should have received an email with your login credentials. Please make sure to change your password once you've logged in.

You now have a 14-day trial period to set up your VA. If a subscription is not activated within this period, your Virtual Airline will be permanently removed from the platform.

We’ve prepared a comprehensive <a href="https://docs.vamsys.dev/checklist">setup checklist</a> to guide you through the next steps. It’s essential to follow this checklist closely to ensure a smooth setup. If you have any questions that aren’t covered in the documentation, feel free to reach out to us via the #questions channel on our Discord or the vAMSYS Support ticket system, both of which you can find on your Orwell Dashboard.

We can’t wait to see you in the skies!

Best Regards,
Team vAMSYS
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

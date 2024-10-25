@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'vAMSYS' || trim($slot) === 'vAMSYS-Beta')
<img src="https://vamsys.io/assets/images/logo/vAMSYS-dark-logo.png" class="logo" alt="vAMSYS">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

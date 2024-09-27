<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
    <div class="card p-4 space-y-2 md:col-span-2">
        <h5 class="font-semibold text-lg mb-4">Delete Your vAMSYS User Account</h5>
        <p>Deleting your <strong>User Account</strong> will set it to inactive. It will remain so for 90 days, after which it will be permanently removed.</p>
        <p>If you log back into the account during the 90 day grace period, your account will be automatically re-activated.</p>
        <p>Failure to log back in before {{ \Carbon\Carbon::now()->addDays(90)->format('jS M Y') }} will result in permanent and irrevocable account deletion.</p>
        <p>You will not able to re-create your User Account or re-join vAMSYS at a future date.</p>
    </div>
    <button wire:click="freezeUser" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm. This will delete your USER and all Pilot Accounts|DELETE" class="btn btn-danger btn-delete-account">Deactivate My User and All Pilot Accounts</button>
</div>

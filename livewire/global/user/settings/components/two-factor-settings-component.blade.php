<div class="card border border-[#ebedf2] dark:border-[#191e3a] rounded-md">
    <h6 class="text-lg pt-4 px-4 font-bold">Two Factor Authentication</h6>
    <div class="px-4 mb-5">
        Add additional security to your account using two factor authentication.
    </div>
    <div class="grid px-4 mb-5 grid-cols-1">
        @if (session('status') == 'two-factor-authentication-confirmed')
            <div class="mb-4 font-medium text-sm">
                Two factor authentication confirmed and enabled successfully.
            </div>
            <div class="mb-4 font-medium text-sm">
                Please save these backup codes. They can be used to access vAMSYS if you loose your two-factor device.
            </div>
            <div>
                @foreach($this->user->recoveryCodes() as $code)
                    {{ $code }}<br/>
                @endforeach
            </div>
            <div class="mb-4 font-medium text-sm">

            </div>
        @endif
        @if($this->user->two_factor_confirmed_at)
            <form action="{{ route('two-factor.disable') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Disable Two Factor Authentication </button>
            </form>
        @else
            @if (session('status') == 'two-factor-authentication-enabled')
                <div class="mb-4 font-medium text-sm">
                    Please finish configuring two factor authentication below.
                </div>
                <div class="mb-4 font-medium text-sm">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
                <form action="{{ route('two-factor.confirm') }}" method="POST">
                    @csrf
                    <input type="text" name="code" placeholder="Enter the Generated Code"/>
                    <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Confirm </button>
                </form>
            @else
            <form action="{{ route('two-factor.enable') }}" method="POST">
                @csrf
                <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Enable Two Factor Authentication </button>
            </form>
            @endif
        @endif


    </div>
</div>

<!-- App Logo -->
<div class="logo-box flex flex-row">
    @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
        <!-- Light Logo -->
        <div class="logo-light">
            <img src="{{ asset('/assets/images/logo/vAMSYS-white-logo.png') }}" class="logo-lg max-h-[60px] px-4" alt="Light logo">
            <img src="{{ asset('/assets/images/logo/V-light.png') }}" class="logo-sm h-[60px]" alt="Small logo">
        </div>

        <!-- Dark Logo -->
        <div class="logo-dark">
            <img src="{{ asset('/assets/images/logo/vAMSYS-dark-logo.png') }}" class="logo-lg max-h-[60px] px-4" alt="Dark logo">
            <img src="{{ asset('/assets/images/logo/V-dark.png') }}" class="logo-sm h-[60px]" alt="Small logo">
        </div>
    @endif
</div>

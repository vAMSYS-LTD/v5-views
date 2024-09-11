<x-layouts.auth>
    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="{{ $image }}" alt="image" class="h-full w-full object-cover"/>
        </div>
        <div class="relative flex min-h-screen items-center justify-center px-6 py-10 sm:px-16">
            <div
                class="relative w-full max-w-[600px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                <div
                    class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 py-20">
                    <div class="mx-auto w-full max-w-[440px]">
                        <div class="mb-10">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Access
                                Denied</h1>
                            @if($airline)
                                <p class="text-base font-bold leading-normal dark:text-white">Your access privileges
                                    to {{ $airline->name }}
                                    have been permanently revoked.</p>
                            @else
                                <p class="text-base font-bold leading-normal dark:text-white">Your vAMSYS access
                                    privileges
                                    have been permanently revoked.</p>
                            @endif

                            @if($reason)
                                <p class="text-base font-bold leading-normal dark:text-white mt-4">{{ $reason }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.auth>

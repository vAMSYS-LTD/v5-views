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
                        <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-3xl">
                            Virtual Airline Changed
                        </h1>
                        <p class="text-base font-bold leading-normal dark:text-white">
                            You have changed Virtual Airlines. As a result, you were redirected here.
                        </p>
                        <a href="/phoenix" class="btn bg-primary text-white mt-8 w-full">
                            Take me back to Phoenix
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>

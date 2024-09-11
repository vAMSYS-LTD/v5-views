<x-layouts.auth>
    <div>
        <div class="absolute inset-0">
            <img src="{{ $image }}" alt="image" class="h-full w-full object-cover" />
        </div>
        <div class="relative flex min-h-screen items-center justify-center px-6 py-10 sm:px-16">
            <div
                class="relative w-full max-w-[600px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                <div class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 py-20">
                    <div class="mx-auto w-full max-w-[440px]">
                        <div class="mb-10">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Registered!</h1>
                            <p class="text-base font-bold leading-normal dark:text-white">Please check your email for verification link</p>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="flex items-center p-3.5 rounded text-success bg-success-light dark:bg-success-dark-light">
                                <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>A new email verification link has been emailed to you!</span>
                            </div>
                        @endif
                        <form class="space-y-5 dark:text-white" action="/email/verification-notification" method="POST">
                            @csrf

                            @if($errors->all())
                                <div class="w-full text-center text-lg rounded-md bg-red-600 p-1 shadow bg-opacity-40">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <button wire:loading.attr="disabled" type="submit" class="btn btn-primary !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]"> Resend Email </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>

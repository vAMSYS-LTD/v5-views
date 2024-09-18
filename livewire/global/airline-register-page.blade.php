<div x-data="auth">
    @if($image)
        <div class="absolute inset-0">
            <img src="{{ $image }}" alt="image" class="h-full w-full object-cover"/>
        </div>
    @endif
    <div class="relative flex min-h-screen items-center justify-center px-6 py-10 sm:px-16">
        <div
            class="relative w-full max-w-[600px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
            <div
                class="relative flex flex-col justify-center rounded-md bg-white/60 px-6 py-20 backdrop-blur-lg dark:bg-black/50">
                <div class="mx-auto w-full max-w-[440px]">
                    <div class="mb-5">
                        <div>
                            <img x-show="!darkMode" src="{{ $logoBright }}">
                            <img x-show="darkMode" src="{{ $logoDark }}">
                        </div>
                        <p class="mt-2 text-center text-2xl font-bold leading-normal dark:text-white">{{ $slogan }}</p>
                    </div>
                    <form class="dark:text-white" action="/register" method="POST">
                        @csrf
                        <input type="hidden" name="airline" value="{{ $airlineId }}">
                        @if($errors->all())
                            <div class="w-full rounded-md bg-red-600 bg-opacity-40 p-1 text-center text-lg shadow">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @if(Auth::user())
                            <div class="text-base font-bold dark:text-white">Good News! You have a vAMSYS Account already.</div>
                            @if($rulesLink)
                            <div class="mt-4">
                                <label class="flex cursor-pointer items-center">
                                    <input type="checkbox" name="agree" class="bg-white form-checkbox dark:bg-black"/>
                                    <span class="dark:text-white ml-2">
                                        <a href="{{ $rulesLink }}" target="_blank">I have read and agree to the rules</a>
                                    </span>
                                </label>
                            </div>
                            @endif
                        @else
                            <p class="text-base font-bold leading-normal dark:text-white">Enter your details to create your pilot account</p>
                            <div class="mt-4 space-y-5">
                                <div>
                                    <div class="relative text-white-dark">
                                        <input id="FirstName" required name="first_name" placeholder="First Name" class="form-input ps-10 placeholder:text-white-dark" />
                                        <span class="absolute top-1/2 -translate-y-1/2 start-4">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <circle cx="9" cy="4.5" r="3" fill="#888EA8"></circle>
                                                    <path opacity="0.5" d="M15 13.125C15 14.989 15 16.5 9 16.5C3 16.5 3 14.989 3 13.125C3 11.261 5.68629 9.75 9 9.75C12.3137 9.75 15 11.261 15 13.125Z" fill="#888EA8"></path>
                                                </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative text-white-dark">
                                        <input id="LastName" required name="last_name" placeholder="Last Name" class="form-input ps-10 placeholder:text-white-dark" />
                                        <span class="absolute top-1/2 -translate-y-1/2 start-4">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <circle cx="9" cy="4.5" r="3" fill="#888EA8"></circle>
                                                    <path opacity="0.5" d="M15 13.125C15 14.989 15 16.5 9 16.5C3 16.5 3 14.989 3 13.125C3 11.261 5.68629 9.75 9 9.75C12.3137 9.75 15 11.261 15 13.125Z" fill="#888EA8"></path>
                                                </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative text-white-dark">
                                        <input id="Email" type="email" required name="email" placeholder="Email" class="form-input ps-10 placeholder:text-white-dark" />
                                        <span class="absolute top-1/2 -translate-y-1/2 start-4">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                  d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z"
                                                  fill="currentColor" />
                                            <path
                                                d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative text-white-dark">
                                        <input id="Password" type="password" required name="password" placeholder="Password" class="form-input ps-10 placeholder:text-white-dark" />
                                        <span class="absolute top-1/2 -translate-y-1/2 start-4">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                  d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z"
                                                  fill="currentColor" />
                                            <path d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z" fill="currentColor" />
                                            <path d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z" fill="currentColor" />
                                            <path d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z" fill="currentColor" />
                                            <path
                                                d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    @if($rulesLink)
                                        <div class="mt-4">
                                            <label class="flex cursor-pointer items-center">
                                                <input type="checkbox" name="agree" class="bg-white form-checkbox dark:bg-black"/>
                                                <span class="dark:text-white ml-2">
                                        <a href="{{ $rulesLink }}" target="_blank">I have read and agree to the rules</a>
                                    </span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="items-center">
                                    <x-turnstile />
                                </div>
                            </div>
                        @endif

                        <button wire:loading.attr="disabled" type="submit" class="btn btn-primary !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]"> Register </button>
                    </form>
                    <div class="mt-4 text-center dark:text-white">
                        Already have an account ?
                        <a href="{{ route('general.login', ['slug' => $slug]) }}" class="transition hover:text-primary">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // main section
    document.addEventListener('alpine:init', () => {
        Alpine.data('auth', () => ({
            languages: [{
                id: 1,
                key: 'Chinese',
                value: 'zh',
            },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],
        }));
    });
</script>

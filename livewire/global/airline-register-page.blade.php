<div>
    <div class="absolute inset-0 h-screen w-screen">
        <img src="{{ $image }}" alt="image" class="h-full w-full object-cover" />
    </div>

    <div class="relative flex flex-col items-center justify-center h-screen">
        <div class="flex justify-center">
            <div class="max-w-md px-4 mx-auto">
                <div class="card overflow-hidden shadow-lg">
                    <div class="p-9">
                        <div class="text-center mx-auto w-3/4">
                            <img x-show="!darkMode" src="{{ $logoBright }}">
                            <img x-show="darkMode" src="{{ $logoDark }}">
                            <p class="text-gray-400 mb-9">{{ $slogan }}</p>
                        </div>
                        <form class="space-y-5 dark:text-white" action="/register" method="POST">
                            @csrf
                            <input type="hidden" name="airline" value="{{ $airlineId }}">
                            @if($errors->all())
                                <div class="bg-danger/10 text-danger border border-danger/20 text-sm rounded-md py-3 px-5" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="bg-success/10 text-success border border-success/20 text-sm rounded-md py-3 px-5">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if(Auth::user())
                                <p>Good News! You have a vAMSYS Account already.</p>
                            @else
                                <div class="mb-6 space-y-2">
                                    <label for="first_name" class="font-semibold text-gray-500">First Name</label>
                                    <input class="form-input" type="email" id="first_name" name="first_name" required="" placeholder="Enter your First Name">
                                </div>

                                <div class="mb-6 space-y-2">
                                    <label for="last_name" class="font-semibold text-gray-500">Last Name</label>
                                    <input class="form-input" type="email" id="first_name" name="last_name" required="" placeholder="Enter your Last Name">
                                </div>

                                <div class="mb-6 space-y-2">
                                    <label for="emailaddress" class="font-semibold text-gray-500">Email address</label>
                                    <input class="form-input" type="email" id="emailaddress" name="email" required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-6 space-y-2">
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="password" class="font-semibold text-gray-500">Password</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="password" name="password" id="password" class="form-input rounded-e-none" placeholder="Enter your password">
                                    </div>
                                </div>

                                <x-turnstile />
                            @endif

                            @if($rulesLink)
                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="agree" class="form-checkbox rounded text-primary" id="checkbox-agree">
                                        <label class="ms-2" for="checkbox-agree"><a href="{{ $rulesLink }}" target="_blank">I have read and agree to the rules</a></label>
                                    </div>
                                </div>
                            @endif

                            <div class="text-center mb-6">
                                <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Register </button>
                            </div>

                            <p class="text-gray-400 mb-4">
                                <a href="{{ route('general.login', ['slug' => $slug]) }}" class="text-muted text-sm underline-offset-4">Have an account? Log in Here</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

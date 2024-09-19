<x-layouts.auth>
    <div class="absolute inset-0 h-screen w-screen">
        <img src="{{ $image }}" alt="image" class="h-full w-full object-cover" />
    </div>

    <div class="relative flex flex-col items-center justify-center h-screen">
        <div class="flex justify-center">
            <div class="max-w-md px-4 mx-auto">
                <div class="card overflow-hidden shadow-lg">
                    <div class="p-9">
                        <div class="text-center mx-auto w-3/4">
                            <h4 class="text-dark/70 text-center text-lg font-bold dark:text-light/80 mb-2">Pilot Hub</h4>
                            <p class="text-gray-400 mb-9">Enter your email address and password to access.</p>
                        </div>
                        <form class="space-y-5 dark:text-white" action="{{ route('login') }}" method="POST">
                            @csrf

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

                            <div class="mb-6 space-y-2">
                                <label for="emailaddress" class="font-semibold text-gray-500">Email address</label>
                                <input class="form-input" type="email" id="emailaddress" name="email" required="" placeholder="Enter your email">
                            </div>

                            <div class="mb-6 space-y-2">
                                <div class="flex justify-between items-center mb-2">
                                    <label for="password" class="font-semibold text-gray-500">Password</label>
                                    <a href="{{ route('password.request') }}" class="text-muted text-xs underline decoration-dashed underline-offset-4">Forgot your password?</a>
                                </div>

                                <div class="flex items-center">
                                    <input type="password" name="password" id="password" class="form-input rounded-e-none" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center">
                                    <input type="checkbox" name="remember" class="form-checkbox rounded text-primary" id="checkbox-signin" checked>
                                    <label class="ms-2" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="text-center mb-6">
                                <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Sign In </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.auth>

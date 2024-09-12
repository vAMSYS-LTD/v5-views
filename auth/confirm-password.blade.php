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
                            <h4 class="text-dark/70 text-center text-lg font-bold dark:text-light/80 mb-2">Confirm Password</h4>
                            <p class="text-gray-400 mb-9">You are accessing a sensitive section. Please confirm your password</p>
                        </div>
                        <form class="space-y-5 dark:text-white" action="{{ route('password.confirm') }}" method="POST">
                            @csrf

                            @if($errors->all())
                                <div class="bg-danger/10 text-danger border border-danger/20 text-sm rounded-md py-3 px-5" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="mb-6 space-y-2">
                                <div class="flex items-center">
                                    <input type="password" name="password" id="password" class="form-input rounded-e-none" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="text-center mb-6">
                                <button wire:loading.attr="disabled" class="btn bg-primary text-white" type="submit"> Confirm </button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>

</x-layouts.auth>

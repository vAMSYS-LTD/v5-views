<x-layouts.auth>

    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="/assets/images/backgrounds/1.jpg" alt="image" class="h-full w-full object-cover"/>
        </div>
        <div class="relative flex min-h-screen items-center justify-center px-6 py-10 sm:px-16">
            <div
                class="relative w-full max-w-[600px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                <div
                    class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 py-20">
                    <div class="mx-auto w-full max-w-[440px]">
                        <div class="mb-10">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">{{ $client->name }}</h1>
                            <p class="text-base font-bold leading-normal dark:text-white">Is requesting permission to
                                access your vAMSYS User account.</p>
                        </div>
                        <div class="space-y-5 dark:text-white">
                            @if($errors->all())
                                <div class="w-full text-center text-lg rounded-md bg-red-600 p-1 shadow bg-opacity-40">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if (count($scopes) > 0)
                                <div class="scopes">
                                    <p><strong>This application will be able to:</strong></p>

                                    <ul>
                                        @foreach ($scopes as $scope)
                                            <li>{{ $scope->description }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div>
                                <div class="relative text-white-dark">

                                </div>
                            </div>
                            <!-- Authorize Button -->
                            <form method="post" action="{{ route('passport.authorizations.approve') }}">
                                @csrf

                                <input type="hidden" name="state" value="{{ $request->state }}">
                                <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                                <button type="submit"
                                        class="btn btn-primary !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                    Authorize
                                </button>
                            </form>

                            <!-- Cancel Button -->
                            <form method="post" action="{{ route('passport.authorizations.deny') }}">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="state" value="{{ $request->state }}">
                                <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                                <button
                                    class="btn btn-danger !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.auth>

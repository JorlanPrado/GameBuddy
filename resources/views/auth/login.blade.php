<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Email Address -->
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    {{-- logo --}}
                                    <div class="text-center mb-5">
                                        <img src="/img/logo.png" style="width: 195px;" alt="logo" class="mx-auto">
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        {{-- email --}}
                                        <div class="form-outline mb-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        {{-- password --}}
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <div class="input-group">
                                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

                                                <button type="button" class="btn btn-outline-custom-danger" id="togglePassword">
                                                    <i class="bi bi-eye-slash"></i>
                                                </button>
                                            </div>

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        {{-- remember me --}}
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>


                                        {{-- log in button --}}
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-block fa-lg gradient-custom-3 mb-3 btn-login text-white">
                                                <h1>{{ __('Log in') }}</h1>
                                            </button>

                                            {{-- reset password --}}
                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>


                                        {{-- create account --}}
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-custom-danger">Create new</button></a>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            {{-- about the web/app --}}
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h2 class="custom-text mb-4"><b>GameBuddy is not just another dating website</b>
                                    </h2>
                                    <p class="small mb-0" style="font-weight: bold; font-size: 18px;">
                                        It's a unique platform tailored for gamers seeking more than just romance,
                                        it's a place where you can find your perfect gaming companion.
                                        At GameBuddy, we understand the importance of shared interests,
                                        and what better way to connect than through the thrilling world of gaming?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordButton = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePasswordButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Change the eye icon based on the password visibility
                togglePasswordButton.innerHTML = type === 'password' ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
            });
        });
    </script>
</x-guest-layout>



<!-- Password -->
{{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

<!-- Remember Me -->
{{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
</label>
</div> --}}

{{-- <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
{{ __('Forgot your password?') }}
</a>
@endif

<x-primary-button class="ml-3">
    {{ __('Log in') }}
</x-primary-button>
</div> --}}
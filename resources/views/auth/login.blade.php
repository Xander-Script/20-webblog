<x-app-layout>
    {{-- todo: validation errors & session status --}}
    <form action="{{ route('login') }}" method="post" class="single-page-form" aria-labelledby="page-header">
        <h1 id="page-header">{{ __("Log in") }}</h1>

        @csrf

        <div>
            <label for="email">{{ __("Email") }} <span class="required">{{ __("(required)") }}</span></label>
            <input type="email" id="email" name="email" required autofocus value="{{ old('email') }}" aria-required="true"
            placeholder="{{ __("Email") }}">
        </div>

        <div>
            <label for="password">{{ __("Password") }} <span class="required">{{ __("(required)") }}</span></label>
            <input type="password" id="password" name="password" required autocomplete="current-password"
                   placeholder="{{ __("Password") }}" aria-required="true">
        </div>

        <div class="checkbox-control">
            <input type="checkbox" id="remember_me">
            <label for="remember_me">
                {{ __("Remember me") }}
            </label>
        </div>

        <div>
            <button type="submit" class="bg-red-50 w-full">{{ __("Log in") }}</button>
        </div>

        @if (Route::has('password.request'))
            <div class="text-right mt-4">
                <a class="underline text-sm text-center text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </form>
</x-app-layout>

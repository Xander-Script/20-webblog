<x-app-layout>
    {{-- todo: validation errors & session status --}}
    <form action="{{ route('login') }}" method="post" class="single-page-form" id="login" aria-labelledby="page-header">
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
            <button type="submit">{{ __("Log in") }}</button>
        </div>

        <hr>

        <p>
            <a href="{{ route('register') }}">{{ __("Create a new account") }}</a>
            @if (Route::has('password.request'))
                or
                <a class="password-request" href="{{ route('password.request') }}">
                    {{ __('reset your password') }}
                </a>
            @endif
        </p>
    </form>
</x-app-layout>

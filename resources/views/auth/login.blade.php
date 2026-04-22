<x-guest-layout>
    <div class="auth-form-wrapper">
        <div class="auth-form-header">
            <span class="auth-form-tag">Welcome back</span>
            <h2 class="auth-form-title">Sign in to SprintSpace</h2>
            <p class="auth-form-subtitle">
                Access your dashboard and continue managing your software projects.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="auth-status-message" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <!-- Email Address -->
            <div class="auth-form-group">
                <label for="email" class="auth-label">Email Address</label>
                <input
                    id="email"
                    class="auth-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email"
                >
                <x-input-error :messages="$errors->get('email')" class="auth-error" />
            </div>
            <!-- Password -->
            <div class="auth-form-group">
                <label for="password" class="auth-label">Password</label>
                <input
                    id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >
                <x-input-error :messages="$errors->get('password')" class="auth-error" />
            </div>
            <!-- Remember Me and Forgot Password -->
            <div class="auth-form-row">
                <label for="remember_me" class="auth-checkbox-wrapper">
                    <input id="remember_me" type="checkbox" class="auth-checkbox" name="remember">
                    <span>Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="auth-inline-link" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <button type="submit" class="auth-button">
                Sign In
            </button>

            <p class="auth-alt-text">
                Don’t have an account?
                <a href="{{ route('register') }}" class="auth-inline-link">Create one</a>
            </p>
        </form>
    </div>
</x-guest-layout>

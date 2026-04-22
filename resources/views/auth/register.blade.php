<x-guest-layout>
    <div class="auth-form-wrapper">
        <div class="auth-form-header">
            <span class="auth-form-tag">Get started</span>
            <h2 class="auth-form-title">Create your SprintSpace account</h2>
            <p class="auth-form-subtitle">
                Register to add, edit and manage your own software projects securely.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <div class="auth-form-group">
                <label for="username" class="auth-label">Username</label>
                <input
                    id="username"
                    class="auth-input"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Choose a username"
                >
                <x-input-error :messages="$errors->get('username')" class="auth-error" />
            </div>

            <div class="auth-form-group">
                <label for="email" class="auth-label">Email Address</label>
                <input
                    id="email"
                    class="auth-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="Enter your email"
                >
                <x-input-error :messages="$errors->get('email')" class="auth-error" />
            </div>

            <div class="auth-form-group">
                <label for="password" class="auth-label">Password</label>
                <input
                    id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a password"
                >
                <x-input-error :messages="$errors->get('password')" class="auth-error" />
            </div>

            <div class="auth-form-group">
                <label for="password_confirmation" class="auth-label">Confirm Password</label>
                <input
                    id="password_confirmation"
                    class="auth-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                >
                <x-input-error :messages="$errors->get('password_confirmation')" class="auth-error" />
            </div>

            <button type="submit" class="auth-button">
                Create Account
            </button>

            <p class="auth-alt-text">
                Already registered?
                <a href="{{ route('login') }}" class="auth-inline-link">Sign in</a>
            </p>
        </form>
    </div>
</x-guest-layout>

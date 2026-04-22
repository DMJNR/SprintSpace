<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SprintSpace') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/sprintspace-auth.css') }}">
</head>
<body class="auth-page">
    <div class="auth-shell">
        <div class="auth-panel auth-panel-left">
            <div class="auth-branding">
                <a href="{{ route('home') }}" class="auth-logo-link">
                    <x-application-logo />
                    <span class="auth-brand-name">SprintSpace</span>
                </a>

                <span class="auth-tag">Software Project Management</span>

                <h1 class="auth-heading">Manage your projects with clarity, structure and speed.</h1>

                <p class="auth-description">
                    SprintSpace helps teams and individuals browse, organise and manage software projects
                    through a secure and modern platform.
                </p>

                <ul class="auth-feature-list">
                    <li>Browse public software projects</li>
                    <li>Create and manage your own entries</li>
                    <li>Secure account access and project ownership</li>
                </ul>
            </div>
        </div>

        <div class="auth-panel auth-panel-right">
            <div class="auth-card">
                <div class="auth-card-top">
                    <a href="{{ route('home') }}" class="auth-mobile-logo-link">
                        <x-application-logo />
                        <span>SprintSpace</span>
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
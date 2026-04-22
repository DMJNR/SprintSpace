@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="section-tag">Project Management Platform</span>
                        <h1 class="hero-title">Welcome to SprintSpace</h1>
                        <p class="hero-text">
                            SprintSpace is a secure software project management website where visitors can browse projects and registered users can create, update and manage their own entries.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg me-2 mb-2">
                                Browse Projects
                            </a>

                            @guest
                                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg mb-2">
                                    Get Started
                                </a>
                            @endguest

                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg mb-2">
                                    Go to Dashboard
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img
                            src="{{ asset('images/hero-dashboard.png') }}"
                            alt="SprintSpace dashboard preview"
                            class="img-fluid hero-image"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="features-section section-spacing">
        <div class="container">
            <div class="section-heading text-center">
                <span class="section-tag">Features</span>
                <h2>Everything you need to manage projects clearly</h2>
                <p>
                    SprintSpace makes it easy to explore software projects publicly while giving registered users secure tools to manage their own work.
                </p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-folder2-open"></i>
                        </div>
                        <h3>Browse Projects</h3>
                        <p>View software projects, read descriptions, and explore important details with ease.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3>Search Quickly</h3>
                        <p>Find projects by title or start date using a simple and accessible search system.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3>Secure Access</h3>
                        <p>Registered users can manage their own projects with authentication and authorisation.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h3>Manage Projects</h3>
                        <p>Create, edit and organise projects through a clean and responsive dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Browse Projects Section --}}
    <section class="browse-section section-spacing">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="content-image-wrapper">
                        <img
                            src="{{ asset('images/html-css-collage-concept.jpg') }}"
                            alt="Browse software projects"
                            class="img-fluid section-image"
                        >
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="content-block">
                        <span class="section-tag">Explore</span>
                        <h2>Browse available software projects</h2>
                        <p>
                            Visitors can view project titles, dates and descriptions, then open a dedicated page
                            to see more details such as phase, end date and owner email.
                        </p>
                        <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg">
                            Browse Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Get Started Section --}}
    <section class="get-started-section section-spacing">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="content-block">
                        <span class="section-tag">Join SprintSpace</span>
                        <h2>Get started and manage your own projects</h2>
                        <p>
                            Create an account to add new projects, update your existing entries and manage your work
                            securely from your personal dashboard.
                        </p>

                        @guest
                            <a href="{{ route('register') }}" class="btn btn-dark btn-lg">
                                Get Started
                            </a>
                        @endguest

                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-dark btn-lg">
                                Open Dashboard
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="content-image-wrapper">
                        <img
                            src="{{ asset('images/person-front-computer-working-html.jpg') }}"
                            alt="User managing projects in SprintSpace"
                            class="img-fluid section-image"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
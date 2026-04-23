@extends('layouts.app')

@push('pageStyles')
    <link rel="stylesheet" href="{{ asset('css/projects/project-show.css') }}">
@endpush

@section('content')
    <section class="project-show-hero">
        <div class="container">
            <div class="project-show-hero-content">
                <span class="project-show-tag">Project Details</span>

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <h1 class="project-show-title">{{ $project->title }}</h1>
                        <p class="project-show-subtitle">
                            View the full details, timeline and ownership information for this SprintSpace project.
                        </p>
                    </div>

                    <div>
                        <span class="project-show-phase-badge phase-{{ strtolower($project->phase) }}">
                            {{ ucfirst($project->phase) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-show-section">
        <div class="container">
            <div class="row g-4">
                {{-- Main Content --}}
                <div class="col-lg-8">
                    <div class="project-show-card overflow-hidden">
                        <div class="project-show-image-wrapper">
                            <img
                                src="{{ asset('icons/project-placeholder.png') }}"
                                alt="Project preview image"
                                class="project-show-image"
                            >
                        </div>

                        <div class="project-show-body">
                            <div class="project-show-block">
                                <span class="project-show-label">Overview</span>
                                <h2 class="project-show-heading">About this project</h2>
                                <p class="project-show-text">
                                    {{ $project->short_description }}
                                </p>
                            </div>

                            <div class="project-show-divider"></div>

                            <div class="project-show-block">
                                <span class="project-show-label">Timeline</span>
                                <h2 class="project-show-heading">Project schedule</h2>

                                <div class="project-show-timeline-grid">
                                    <div class="project-show-info-card">
                                        <span class="project-show-info-title">Start Date</span>
                                        <strong>{{ $project->start_date->format('d M Y') }}</strong>
                                    </div>

                                    <div class="project-show-info-card">
                                        <span class="project-show-info-title">End Date</span>
                                        <strong>{{ $project->end_date->format('d M Y') }}</strong>
                                    </div>

                                    <div class="project-show-info-card">
                                        <span class="project-show-info-title">Current Phase</span>
                                        <strong>{{ ucfirst($project->phase) }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="project-show-divider"></div>

                            <div class="project-show-actions">
                                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Back to Projects
                                </a>

                                @auth
                                    @if(auth()->id() === $project->user_id)
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil-square me-2"></i>Edit Project
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="project-show-sidebar-card">
                        <span class="project-show-label">Project Information</span>
                        <h2 class="project-show-sidebar-title">Key Details</h2>

                        <div class="project-show-sidebar-list">
                            <div class="project-show-sidebar-item">
                                <span class="sidebar-item-label">Owner Email</span>
                                <strong>{{ $project->user->email }}</strong>
                            </div>

                            <div class="project-show-sidebar-item">
                                <span class="sidebar-item-label">Created By</span>
                                <strong>{{ $project->user->username ?? 'Project Owner' }}</strong>
                            </div>

                            <div class="project-show-sidebar-item">
                                <span class="sidebar-item-label">Phase</span>
                                <strong>{{ ucfirst($project->phase) }}</strong>
                            </div>

                            <div class="project-show-sidebar-item">
                                <span class="sidebar-item-label">Project ID</span>
                                <strong>#{{ $project->id }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="project-show-sidebar-card mt-4">
                        <span class="project-show-label">SprintSpace</span>
                        <h2 class="project-show-sidebar-title">Need to manage your own projects?</h2>
                        <p class="project-show-text-sm">
                            Register or sign in to create, update and manage your own software projects securely.
                        </p>

                        <div class="d-grid gap-2">
                            @guest
                                <a href="{{ route('register') }}" class="btn btn-dark">Get Started</a>
                                <a href="{{ route('login') }}" class="btn btn-outline-dark">Sign In</a>
                            @endguest

                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-dark">Go to Dashboard</a>
                                <a href="{{ route('projects.mine') }}" class="btn btn-outline-dark">View My Projects</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
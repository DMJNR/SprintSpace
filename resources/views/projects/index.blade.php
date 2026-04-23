@extends('layouts.app')



@push('projectstyles')
    <link rel="stylesheet" href="{{ asset('css/projects/projects.css') }}">
@endpush
@section('content')
    {{-- Page Hero / Header --}}
    <section class="page-header-section">
        <div class="container">
            <div class="page-header-content text-center">
                <span class="section-tag">Project Directory</span>
                <h1 class="page-title">Browse Software Projects</h1>
                <p class="page-subtitle">
                    Explore software projects created in SprintSpace, view important details, and search by title or start date.
                </p>
            </div>
        </div>
    </section>

    {{-- Search Section --}}
    <section class="project-search-section">
        <div class="container">
            <div class="search-panel">
                <div class="row align-items-end g-3">
                    <div class="col-lg-5">
                        <label for="title" class="form-label">Search by Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            form="projectSearchForm"
                            class="form-control sprintspace-input"
                            value="{{ request('title') }}"
                            placeholder="Enter a project title"
                        >
                    </div>

                    <div class="col-lg-4">
                        <label for="start_date" class="form-label">Search by Start Date</label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            form="projectSearchForm"
                            class="form-control sprintspace-input"
                            value="{{ request('start_date') }}"
                        >
                    </div>

                    <div class="col-lg-3">
                        <form id="projectSearchForm" method="GET" action="{{ route('projects.index') }}">
                            <div class="d-grid d-sm-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-search me-2"></i>Search
                                </button>
                                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary w-100">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Projects Listing --}}
    <section class="projects-listing-section section-spacing">
        <div class="container">
            @if(request('title') || request('start_date'))
                <div class="results-summary mb-4">
                    <p class="mb-0">
                        Showing results
                        @if(request('title'))
                            for title: <strong>{{ request('title') }}</strong>
                        @endif

                        @if(request('start_date'))
                            @if(request('title')) and @endif
                            for start date: <strong>{{ request('start_date') }}</strong>
                        @endif
                    </p>
                </div>
            @endif

            @forelse($projects as $project)
                <div class="project-card card mb-4 border-0">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-md-4">
                            <div class="project-image-wrapper h-100">
                                <img
                                    src="{{ asset('icons/project-placeholder.png') }}"
                                    alt="Project preview image"
                                    class="project-card-image"
                                >
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card-body project-card-body">
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-start gap-3">
                                    <div>
                                        <span class="project-phase-badge phase-{{ strtolower($project->phase) }}">
                                            {{ ucfirst($project->phase) }}
                                        </span>

                                        <h2 class="project-card-title mt-3 mb-3">
                                            {{ $project->title }}
                                        </h2>
                                    </div>
                                </div>

                                <div class="project-meta mb-3">
                                    <span class="project-meta-item">
                                        <i class="bi bi-calendar-event me-2"></i>
                                        <strong>Start Date:</strong>
                                        {{ $project->start_date->format('d M Y') }}
                                    </span>
                                </div>

                                <p class="project-description">
                                    {{ $project->short_description }}
                                </p>

                                <div class="d-flex flex-wrap gap-2 mt-4">
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">
                                        View Details
                                    </a>

                                    @auth
                                        @if(auth()->id() === $project->user_id)
                                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-dark">
                                                Edit Project
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state-panel text-center">
                    <img
                        src="{{ asset('icons/no-results.png') }}"
                        alt="No projects found"
                        class="empty-state-image mb-4"
                    >
                    <h2 class="h3 mb-3">No projects found</h2>
                    <p class="text-muted mb-4">
                        Try changing your search filters or browse all available SprintSpace projects.
                    </p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">
                        View All Projects
                    </a>
                </div>
            @endforelse

            @if($projects->hasPages())
                <div class="pagination-wrapper mt-5">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection


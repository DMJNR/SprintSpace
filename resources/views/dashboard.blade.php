@extends('layouts.app')

@push('pageStyles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projects/project-form.css') }}">
@endpush

@section('content')
    <section class="dashboard-hero">
        <div class="container">
            <div class="dashboard-hero-content">
                <span class="dashboard-tag">User Dashboard</span>

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <h1 class="dashboard-title">Welcome back, {{ $user->username }}</h1>
                        <p class="dashboard-subtitle">
                            Manage your projects, track your activity, and keep your work organised in SprintSpace.
                        </p>
                    </div>

                    <div class="dashboard-hero-actions">
                        <button
                            type="button"
                            class="btn btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#createProjectModal"
                        >
                            <i class="bi bi-plus-circle me-2"></i>Add Project
                        </button>

                        <a href="{{ route('projects.mine') }}" class="btn btn-outline-light">
                            <i class="bi bi-folder2-open me-2"></i>My Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard-section">
        <div class="container">
            <div class="row g-4">
                {{-- Main Content --}}
                <div class="col-lg-8">
                    <div class="dashboard-card dashboard-overview-card">
                        <div class="dashboard-card-header">
                            <span class="dashboard-card-tag">Overview</span>
                            <h2 class="dashboard-card-title">Your SprintSpace workspace</h2>
                            <p class="dashboard-card-text">
                                From here you can manage your software projects, create new entries,
                                and keep your work updated with ease.
                            </p>
                        </div>

                        <div class="row g-3 dashboard-stats-grid">
                            <div class="col-md-6">
                                <div class="dashboard-stat-card">
                                    <div class="dashboard-stat-icon">
                                        <i class="bi bi-kanban"></i>
                                    </div>
                                    <div>
                                        <span class="dashboard-stat-label">Total Projects</span>
                                        <h3 class="dashboard-stat-value">{{ $projectCount }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dashboard-stat-card">
                                    <div class="dashboard-stat-icon">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                    <div>
                                        <span class="dashboard-stat-label">Account Name</span>
                                        <h3 class="dashboard-stat-value dashboard-stat-text">{{ $user->username }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-card mt-4">
                        <div class="dashboard-card-header">
                            <span class="dashboard-card-tag">Quick Actions</span>
                            <h2 class="dashboard-card-title">What would you like to do next?</h2>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <button
                                    type="button"
                                    class="dashboard-action-card dashboard-action-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#createProjectModal"
                                >
                                    <div class="dashboard-action-icon">
                                        <i class="bi bi-plus-square"></i>
                                    </div>
                                    <div class="text-start">
                                        <h3>Create a New Project</h3>
                                        <p>Add a new software project to your SprintSpace account.</p>
                                    </div>
                                </button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('projects.mine') }}" class="dashboard-action-card">
                                    <div class="dashboard-action-icon">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                    <div>
                                        <h3>Manage My Projects</h3>
                                        <p>View, edit and organise the projects you have already created.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('projects.index') }}" class="dashboard-action-card">
                                    <div class="dashboard-action-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                    <div>
                                        <h3>Browse All Projects</h3>
                                        <p>Explore public software projects across the SprintSpace platform.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('home') }}" class="dashboard-action-card">
                                    <div class="dashboard-action-icon">
                                        <i class="bi bi-house-door"></i>
                                    </div>
                                    <div>
                                        <h3>Return Home</h3>
                                        <p>Go back to the SprintSpace landing page and main navigation.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <div class="dashboard-card dashboard-sidebar-card">
                        <span class="dashboard-card-tag">Profile</span>
                        <h2 class="dashboard-card-title">Account Summary</h2>

                        <div class="dashboard-sidebar-list">
                            <div class="dashboard-sidebar-item">
                                <span class="dashboard-sidebar-label">Username</span>
                                <strong>{{ $user->username }}</strong>
                            </div>

                            <div class="dashboard-sidebar-item">
                                <span class="dashboard-sidebar-label">Email</span>
                                <strong>{{ $user->email }}</strong>
                            </div>

                            <div class="dashboard-sidebar-item">
                                <span class="dashboard-sidebar-label">Projects Created</span>
                                <strong>{{ $projectCount }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-card dashboard-sidebar-card mt-4">
                        <span class="dashboard-card-tag">SprintSpace Tips</span>
                        <h2 class="dashboard-card-title">Stay organised</h2>
                        <p class="dashboard-card-text-sm">
                            Keep your project entries updated with accurate dates, clear descriptions and the correct
                            phase so your dashboard remains useful and easy to manage.
                        </p>

                        <div class="d-grid gap-2">
                            <button
                                type="button"
                                class="btn btn-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#createProjectModal"
                            >
                                Add a Project
                            </button>

                            <a href="{{ route('projects.mine') }}" class="btn btn-outline-dark">
                                View My Projects
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Create Project Modal -->
    <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content sprintspace-modal">
                <div class="modal-header sprintspace-modal-header">
                    <div>
                        <span class="modal-tag">SprintSpace</span>
                        <h2 class="modal-title" id="createProjectModalLabel">Create New Project</h2>
                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <input type="hidden" name="form_context" value="create-project">

                    <div class="modal-body sprintspace-modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="dashboard_title" class="sprintspace-form-label">Project Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    id="dashboard_title"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('title') }}"
                                    placeholder="Enter project title"
                                    required
                                >
                                @if(old('form_context') === 'create-project')
                                    @error('title')
                                        <div class="sprintspace-form-error">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="dashboard_start_date" class="sprintspace-form-label">Start Date</label>
                                <input
                                    type="date"
                                    name="start_date"
                                    id="dashboard_start_date"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('start_date') }}"
                                    required
                                >
                                @if(old('form_context') === 'create-project')
                                    @error('start_date')
                                        <div class="sprintspace-form-error">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="dashboard_end_date" class="sprintspace-form-label">End Date</label>
                                <input
                                    type="date"
                                    name="end_date"
                                    id="dashboard_end_date"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('end_date') }}"
                                    required
                                >
                                @if(old('form_context') === 'create-project')
                                    @error('end_date')
                                        <div class="sprintspace-form-error">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="dashboard_phase" class="sprintspace-form-label">Project Phase</label>
                                <select name="phase" id="dashboard_phase" class="form-select sprintspace-dark-input" required>
                                    <option value="">Select a phase</option>
                                    <option value="design" {{ old('phase') === 'design' ? 'selected' : '' }}>Design</option>
                                    <option value="development" {{ old('phase') === 'development' ? 'selected' : '' }}>Development</option>
                                    <option value="testing" {{ old('phase') === 'testing' ? 'selected' : '' }}>Testing</option>
                                    <option value="deployment" {{ old('phase') === 'deployment' ? 'selected' : '' }}>Deployment</option>
                                    <option value="complete" {{ old('phase') === 'complete' ? 'selected' : '' }}>Complete</option>
                                </select>
                                @if(old('form_context') === 'create-project')
                                    @error('phase')
                                        <div class="sprintspace-form-error">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="dashboard_short_description" class="sprintspace-form-label">Short Description</label>
                                <textarea
                                    name="short_description"
                                    id="dashboard_short_description"
                                    class="form-control sprintspace-dark-input sprintspace-dark-textarea"
                                    rows="6"
                                    placeholder="Write a short description of the project"
                                    required
                                >{{ old('short_description') }}</textarea>
                                @if(old('form_context') === 'create-project')
                                    @error('short_description')
                                        <div class="sprintspace-form-error">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer sprintspace-modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Create Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('pageScripts')
    @if ($errors->any() && old('form_context') === 'create-project')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const createModal = new bootstrap.Modal(document.getElementById('createProjectModal'));
                createModal.show();
            });
        </script>
    @endif
@endpush
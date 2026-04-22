@extends('layouts.app')

@push('pageStyles')
    <link rel="stylesheet" href="{{ asset('css/projects/project-form.css') }}">
@endpush

@section('content')
    <section class="project-form-page">
        <div class="container">
            <div class="project-form-hero">
                <span class="project-form-tag">Create Project</span>

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <h1 class="project-form-title">Add a New Project</h1>
                        <p class="project-form-subtitle">
                            Start a new software project in SprintSpace and keep your work organised with secure project management tools.
                        </p>
                    </div>

                    <div class="project-form-actions">
                        <button
                            type="button"
                            class="btn btn-light btn-lg"
                            data-bs-toggle="modal"
                            data-bs-target="#projectCreateModal"
                        >
                            <i class="bi bi-plus-circle me-2"></i>Open Create Form
                        </button>

                        <a href="{{ route('projects.mine') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Back to My Projects
                        </a>
                    </div>
                </div>
            </div>

            <div class="project-form-info-grid">
                <div class="project-form-info-card">
                    <div class="project-form-info-icon">
                        <i class="bi bi-kanban"></i>
                    </div>
                    <h2>Organise your work</h2>
                    <p>
                        Add important project details such as dates, phase and a concise description to keep your workspace structured.
                    </p>
                </div>

                <div class="project-form-info-card">
                    <div class="project-form-info-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h2>Secure ownership</h2>
                    <p>
                        Every project you create is linked to your account so only you can edit or manage your own entries.
                    </p>
                </div>

                <div class="project-form-info-card">
                    <div class="project-form-info-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h2>Clear project tracking</h2>
                    <p>
                        Use the correct phase and timeline so your dashboard and project pages remain accurate and easy to understand.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Create Project Modal -->
    <div class="modal fade" id="projectCreateModal" tabindex="-1" aria-labelledby="projectCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content sprintspace-modal">
                <div class="modal-header sprintspace-modal-header">
                    <div>
                        <span class="modal-tag">SprintSpace</span>
                        <h2 class="modal-title" id="projectCreateModalLabel">Create New Project</h2>
                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    <div class="modal-body sprintspace-modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="title" class="sprintspace-form-label">Project Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('title') }}"
                                    placeholder="Enter project title"
                                    required
                                >
                                @error('title')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="start_date" class="sprintspace-form-label">Start Date</label>
                                <input
                                    type="date"
                                    name="start_date"
                                    id="start_date"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('start_date') }}"
                                    required
                                >
                                @error('start_date')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="end_date" class="sprintspace-form-label">End Date</label>
                                <input
                                    type="date"
                                    name="end_date"
                                    id="end_date"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('end_date') }}"
                                    required
                                >
                                @error('end_date')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="phase" class="sprintspace-form-label">Project Phase</label>
                                <select name="phase" id="phase" class="form-select sprintspace-dark-input" required>
                                    <option value="">Select a phase</option>
                                    <option value="design" {{ old('phase') === 'design' ? 'selected' : '' }}>Design</option>
                                    <option value="development" {{ old('phase') === 'development' ? 'selected' : '' }}>Development</option>
                                    <option value="testing" {{ old('phase') === 'testing' ? 'selected' : '' }}>Testing</option>
                                    <option value="deployment" {{ old('phase') === 'deployment' ? 'selected' : '' }}>Deployment</option>
                                    <option value="complete" {{ old('phase') === 'complete' ? 'selected' : '' }}>Complete</option>
                                </select>
                                @error('phase')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="short_description" class="sprintspace-form-label">Short Description</label>
                                <textarea
                                    name="short_description"
                                    id="short_description"
                                    class="form-control sprintspace-dark-input sprintspace-dark-textarea"
                                    rows="6"
                                    placeholder="Write a short description of the project"
                                    required
                                >{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer sprintspace-modal-footer">
                        <a href="{{ route('projects.mine') }}" class="btn btn-outline-light">Cancel</a>
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
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const createModal = new bootstrap.Modal(document.getElementById('projectCreateModal'));
                createModal.show();
            });
        </script>
    @endif
@endpush
@extends('layouts.app')

@push('pageStyles')
    <link rel="stylesheet" href="{{ asset('css/projects/project-form.css') }}">
@endpush

@section('content')
    <section class="project-form-page">
        <div class="container">
            <div class="project-form-hero">
                <span class="project-form-tag">Edit Project</span>

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <h1 class="project-form-title">Update Project</h1>
                        <p class="project-form-subtitle">
                            Review and update your project details to keep your SprintSpace workspace accurate and well maintained.
                        </p>
                    </div>

                    <div class="project-form-actions">
                        <button
                            type="button"
                            class="btn btn-light btn-lg"
                            data-bs-toggle="modal"
                            data-bs-target="#projectEditModal"
                        >
                            <i class="bi bi-pencil-square me-2"></i>Open Edit Form
                        </button>

                        <a href="{{ route('projects.mine') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Back to My Projects
                        </a>
                    </div>
                </div>
            </div>

            <div class="project-edit-preview">
                <div class="project-edit-preview-card">
                    <span class="modal-tag">Current Project</span>
                    <h2>{{ $project->title }}</h2>
                    <p>{{ $project->short_description }}</p>

                    <div class="project-edit-meta-grid">
                        <div class="project-edit-meta-item">
                            <span>Start Date</span>
                            <strong>{{ $project->start_date->format('d M Y') }}</strong>
                        </div>

                        <div class="project-edit-meta-item">
                            <span>End Date</span>
                            <strong>{{ $project->end_date->format('d M Y') }}</strong>
                        </div>

                        <div class="project-edit-meta-item">
                            <span>Phase</span>
                            <strong>{{ ucfirst($project->phase) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Project Modal -->
    <div class="modal fade" id="projectEditModal" tabindex="-1" aria-labelledby="projectEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content sprintspace-modal">
                <div class="modal-header sprintspace-modal-header">
                    <div>
                        <span class="modal-tag">SprintSpace</span>
                        <h2 class="modal-title" id="projectEditModalLabel">Edit Project</h2>
                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('projects.update', $project) }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-body sprintspace-modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="title" class="sprintspace-form-label">Project Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="form-control sprintspace-dark-input"
                                    value="{{ old('title', $project->title) }}"
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
                                    value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}"
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
                                    value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}"
                                    required
                                >
                                @error('end_date')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="phase" class="sprintspace-form-label">Project Phase</label>
                                <select name="phase" id="phase" class="form-select sprintspace-dark-input" required>
                                    <option value="design" {{ old('phase', $project->phase) === 'design' ? 'selected' : '' }}>Design</option>
                                    <option value="development" {{ old('phase', $project->phase) === 'development' ? 'selected' : '' }}>Development</option>
                                    <option value="testing" {{ old('phase', $project->phase) === 'testing' ? 'selected' : '' }}>Testing</option>
                                    <option value="deployment" {{ old('phase', $project->phase) === 'deployment' ? 'selected' : '' }}>Deployment</option>
                                    <option value="complete" {{ old('phase', $project->phase) === 'complete' ? 'selected' : '' }}>Complete</option>
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
                                >{{ old('short_description', $project->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer sprintspace-modal-footer">
                        <a href="{{ route('projects.mine') }}" class="btn btn-outline-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Update Project
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
                const editModal = new bootstrap.Modal(document.getElementById('projectEditModal'));
                editModal.show();
            });
        </script>
    @endif
@endpush
@extends('layouts.app')

@push('pageStyles')
    <link rel="stylesheet" href="{{ asset('css/projects/my-projects.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projects/project-form.css') }}">
@endpush

@section('content')
    <section class="my-projects-hero">
        <div class="container">
            <div class="my-projects-hero-content">
                <span class="my-projects-tag">Project Management</span>

                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <h1 class="my-projects-title">My Projects</h1>
                        <p class="my-projects-subtitle">
                            View, organise, update and manage the software projects you have createdin SprintSpace.
                        </p>
                    </div>

                    <div class="my-projects-hero-actions">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-light">
                            <i class="bi bi-speedometer2 me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-projects-section">
        <div class="container">
            @if($projects->count())
                <div class="my-projects-summary mb-4">
                    <p class="mb-0">
                        You currently have <strong>{{ $projects->total() }}</strong> project{{ $projects->total() === 1 ? '' : 's' }} in SprintSpace.
                    </p>
                </div>
            @endif

            @forelse($projects as $project)
                <div class="my-project-card">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-md-4">
                            <div class="my-project-image-wrapper">
                                <img
                                    src="{{ asset('images/project-placeholder.jpg') }}"
                                    alt="Project preview image"
                                    class="my-project-image"
                                >
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="my-project-body">
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-start gap-3">
                                    <div>
                                        <span class="my-project-phase-badge phase-{{ strtolower($project->phase) }}">
                                            {{ ucfirst($project->phase) }}
                                        </span>

                                        <h2 class="my-project-title mt-3 mb-3">
                                            {{ $project->title }}
                                        </h2>
                                    </div>
                                </div>

                                <div class="my-project-meta">
                                    <div class="my-project-meta-item">
                                        <span class="meta-label">Start Date</span>
                                        <strong>{{ $project->start_date->format('d M Y') }}</strong>
                                    </div>

                                    <div class="my-project-meta-item">
                                        <span class="meta-label">End Date</span>
                                        <strong>{{ $project->end_date->format('d M Y') }}</strong>
                                    </div>

                                    <div class="my-project-meta-item">
                                        <span class="meta-label">Project ID</span>
                                        <strong>#{{ $project->id }}</strong>
                                    </div>
                                </div>

                                <p class="my-project-description">
                                    {{ $project->short_description }}
                                </p>

                                <div class="my-project-actions">
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-eye me-2"></i>View
                                    </a>

                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editProjectModal{{ $project->id }}"
                                    >
                                        <i class="bi bi-pencil-square me-2"></i>Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteProjectModal{{ $project->id }}"
                                    >
                                        <i class="bi bi-trash me-2"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Project Modal -->
                <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content sprintspace-modal">
                            <div class="modal-header sprintspace-modal-header">
                                <div>
                                    <span class="modal-tag">SprintSpace</span>
                                    <h2 class="modal-title" id="editProjectModalLabel{{ $project->id }}">Edit Project</h2>
                                </div>

                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('projects.update', $project) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="form_context" value="edit-project">
                                <input type="hidden" name="edit_project_id" value="{{ $project->id }}">

                                <div class="modal-body sprintspace-modal-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="title_{{ $project->id }}" class="sprintspace-form-label">Project Title</label>
                                            <input
                                                type="text"
                                                name="title"
                                                id="title_{{ $project->id }}"
                                                class="form-control sprintspace-dark-input"
                                                value="{{ old('edit_project_id') == $project->id ? old('title') : $project->title }}"
                                                required
                                            >
                                            @if(old('edit_project_id') == $project->id)
                                                @error('title')
                                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start_date_{{ $project->id }}" class="sprintspace-form-label">Start Date</label>
                                            <input
                                                type="date"
                                                name="start_date"
                                                id="start_date_{{ $project->id }}"
                                                class="form-control sprintspace-dark-input"
                                                value="{{ old('edit_project_id') == $project->id ? old('start_date') : $project->start_date->format('Y-m-d') }}"
                                                required
                                            >
                                            @if(old('edit_project_id') == $project->id)
                                                @error('start_date')
                                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label for="end_date_{{ $project->id }}" class="sprintspace-form-label">End Date</label>
                                            <input
                                                type="date"
                                                name="end_date"
                                                id="end_date_{{ $project->id }}"
                                                class="form-control sprintspace-dark-input"
                                                value="{{ old('edit_project_id') == $project->id ? old('end_date') : $project->end_date->format('Y-m-d') }}"
                                                required
                                            >
                                            @if(old('edit_project_id') == $project->id)
                                                @error('end_date')
                                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label for="phase_{{ $project->id }}" class="sprintspace-form-label">Project Phase</label>
                                            @php
                                                $currentPhase = old('edit_project_id') == $project->id ? old('phase') : $project->phase;
                                            @endphp
                                            <select name="phase" id="phase_{{ $project->id }}" class="form-select sprintspace-dark-input" required>
                                                <option value="design" {{ $currentPhase === 'design' ? 'selected' : '' }}>Design</option>
                                                <option value="development" {{ $currentPhase === 'development' ? 'selected' : '' }}>Development</option>
                                                <option value="testing" {{ $currentPhase === 'testing' ? 'selected' : '' }}>Testing</option>
                                                <option value="deployment" {{ $currentPhase === 'deployment' ? 'selected' : '' }}>Deployment</option>
                                                <option value="complete" {{ $currentPhase === 'complete' ? 'selected' : '' }}>Complete</option>
                                            </select>
                                            @if(old('edit_project_id') == $project->id)
                                                @error('phase')
                                                    <div class="sprintspace-form-error">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label for="short_description_{{ $project->id }}" class="sprintspace-form-label">Short Description</label>
                                            <textarea
                                                name="short_description"
                                                id="short_description_{{ $project->id }}"
                                                class="form-control sprintspace-dark-input sprintspace-dark-textarea"
                                                rows="6"
                                                required
                                            >{{ old('edit_project_id') == $project->id ? old('short_description') : $project->short_description }}</textarea>
                                            @if(old('edit_project_id') == $project->id)
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
                                        <i class="bi bi-save me-2"></i>Update Project
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Project Modal -->
                <div
                    class="modal fade"
                    id="deleteProjectModal{{ $project->id }}"
                    tabindex="-1"
                    aria-labelledby="deleteProjectModalLabel{{ $project->id }}"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content sprintspace-delete-modal">
                            <div class="modal-header sprintspace-delete-modal-header">
                                <div>
                                    <span class="delete-modal-tag">Delete Project</span>
                                    <h2 class="modal-title" id="deleteProjectModalLabel{{ $project->id }}">
                                        Confirm Deletion
                                    </h2>
                                </div>

                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>

                            <div class="modal-body sprintspace-delete-modal-body">
                                <p class="delete-modal-text">
                                    Are you sure you want to delete
                                    <strong>{{ $project->title }}</strong>?
                                </p>

                                <p class="delete-modal-warning mb-0">
                                    This action cannot be undone.
                                </p>
                            </div>

                            <div class="modal-footer sprintspace-delete-modal-footer">
                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                                    Cancel
                                </button>

                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash me-2"></i>Delete Project
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="my-projects-empty-state text-center">
                    <img
                        src="{{ asset('images/no-projects.jpg') }}"
                        alt="No projects yet"
                        class="my-projects-empty-image mb-4"
                    >

                    <h2 class="mb-3">You have not added any projects yet</h2>
                    <p class="text-muted mb-4">
                        Start building your SprintSpace workspace by creating your first software project.
                    </p>

                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Visit your Dashboard to Create a Project
                    </a>
                </div>
            @endforelse

            @if($projects->hasPages())
                <div class="my-projects-pagination">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

@push('pageScripts')
    @if ($errors->any() && old('form_context') === 'edit-project' && old('edit_project_id'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const projectId = "{{ old('edit_project_id') }}";
                const modalId = 'editProjectModal' + projectId;

                const modalElement = document.getElementById(modalId);

                if (modalElement) {
                    const editModal = new bootstrap.Modal(modalElement);
                    editModal.show();
                }
            });
        </script>
    @endif
@endpush
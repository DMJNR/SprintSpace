<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of all projects with optional search and filter capabilities.
     */
    public function index(Request $request): View
    {
        $query = Project::with('user');

        // Apply search filters
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter by start date
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', $request->start_date);
        }

        // Paginate results
        $projects = $query->latest('start_date')->paginate(6)->withQueryString();

        // Return the view with projects and current filter values
        return view('projects.index', [
            'projects' => $projects,
            'title' => $request->title,
            'startDate' => $request->start_date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Return the view for creating a new project
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        // Create a new project associated with the authenticated user
        Project::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'short_description' => $request->short_description,
            'phase' => $request->phase,
        ]);

        // Redirect to the user's projects page with a success message
        return redirect()
            ->route('projects.mine')
            ->with('success', 'Project created successfully.');

    }

    /**
     * Display the specified project.
     */
    public function show(Project $project): View
    {
        // Load the project with its associated user
        $project->load('user');

        // Return the view with the project details
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Display a listing of the authenticated user's projects.
     */
    public function myProjects(Request $request): View
    {
        // Get the authenticated user's projects, ordered by start date
        $projects = $request->user()
            ->projects()
            ->latest('start_date')
            ->paginate(6);
        
        // Return the view with the user's projects
        return view('projects.my-projects', [
            'projects' => $projects,
        ]);
    }
    

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project): View
    {
        // Ensure the authenticated user is the owner of the project
        $this->authorize('update', $project);

        // Return the view for editing the project
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        // Ensure the authenticated user is the owner of the project
        $this->authorize('update', $project);

        // Update the project with the new values
        $project->update($request->validated());

        // Redirect to the project's page with a success message
        return redirect()
            ->route('projects.mine')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        // Ensure the authenticated user is the owner of the project
        $this->authorize('delete', $project);

        // Delete the project
        $project->delete();

        // Redirect to the user's projects page with a success message
        return redirect()
            ->route('projects.mine')
            ->with('success', 'Project deleted successfully.');
    }
}

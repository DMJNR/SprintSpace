<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * Allow logged-in users to create projects
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Only allow users to update project
     */
    public function update(User $user, Project $project): bool
    {
        return $user->id === $project->user_id;
    }

    /**
     * Only allow users to delete project
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->id === $project->user_id;
    }
}

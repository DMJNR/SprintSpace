<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index(Request $request): View
    {
        // Get the authenticated user and count their projects
        $user = $request->user();

        $projectCount = $user->projects()->count();

        // Return the dashboard view with user and project count data
        return view('dashboard', [
            'user' => $user,
            'projectCount' => $projectCount,
        ]);
    }
}

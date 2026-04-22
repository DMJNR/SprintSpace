<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        // If there are no users, we can't create projects, so we exit early
        if ($users->count() === 0) {
            return;
        }


        $projects = [

            // DESIGN
            [
                'title' => 'SprintSpace UI Redesign',
                'start_date' => '2026-05-01',
                'end_date' => '2026-06-01',
                'short_description' => 'Redesign the user interface for SprintSpace to improve usability and accessibility.',
                'phase' => 'design',
            ],

            [
                'title' => 'Client Dashboard Wireframes',
                'start_date' => '2026-04-10',
                'end_date' => '2026-05-10',
                'short_description' => 'Create wireframes for a new client dashboard system for project tracking.',
                'phase' => 'design',
            ],

            // DEVELOPMENT
            [
                'title' => 'E-commerce Payment Integration',
                'start_date' => '2026-03-15',
                'end_date' => '2026-06-30',
                'short_description' => 'Integrate Stripe and PayPal payment systems into the e-commerce platform.',
                'phase' => 'development',
            ],

            [
                'title' => 'Inventory Management System',
                'start_date' => '2026-02-01',
                'end_date' => '2026-05-01',
                'short_description' => 'Develop a real-time inventory tracking system for warehouse operations.',
                'phase' => 'development',
            ],

            [
                'title' => 'HR Portal Backend API',
                'start_date' => '2026-04-01',
                'end_date' => '2026-07-01',
                'short_description' => 'Build RESTful APIs for the HR portal including authentication and employee records.',
                'phase' => 'development',
            ],

            // TESTING
            [
                'title' => 'Mobile App QA Testing',
                'start_date' => '2026-03-01',
                'end_date' => '2026-04-20',
                'short_description' => 'Perform QA testing on the company’s mobile app to identify bugs and usability issues.',
                'phase' => 'testing',
            ],

            [
                'title' => 'Automated Testing Suite',
                'start_date' => '2026-03-20',
                'end_date' => '2026-05-10',
                'short_description' => 'Develop automated test scripts for regression testing across multiple modules.',
                'phase' => 'testing',
            ],

            [
            'title' => 'Mobile App Testing Suite',
            'start_date' => '2026-03-10',
            'end_date' => '2026-05-01',
            'short_description' => 'Create an automated testing suite for the company mobile application.',
            'phase' => 'testing',
            ],

            // DEPLOYMENT
            [
                'title' => 'Cloud Migration Project',
                'start_date' => '2026-01-10',
                'end_date' => '2026-03-15',
                'short_description' => 'Migrate legacy systems to AWS cloud infrastructure.',
                'phase' => 'deployment',
            ],

            [
                'title' => 'Website Deployment Pipeline',
                'start_date' => '2026-02-10',
                'end_date' => '2026-03-25',
                'short_description' => 'Set up CI/CD pipelines for automated deployment of web applications.',
                'phase' => 'deployment',
            ],

            [
            'title' => 'SprintSpace CRM Upgrade',
            'start_date' => '2026-04-01',
            'end_date' => '2026-06-15',
            'short_description' => 'Upgrade the internal CRM system for better client and ticket management.',
            'phase' => 'development',
            ],

            // COMPLETE
            [
                'title' => 'Customer Support Chatbot',
                'start_date' => '2025-11-01',
                'end_date' => '2026-01-15',
                'short_description' => 'Developed and deployed an AI chatbot to handle customer queries.',
                'phase' => 'complete',
            ],

            [
                'title' => 'Marketing Analytics Dashboard',
                'start_date' => '2025-10-01',
                'end_date' => '2025-12-20',
                'short_description' => 'Created a dashboard for analysing marketing campaign performance.',
                'phase' => 'complete',
            ],

            [
                'title' => 'Online Booking System',
                'start_date' => '2025-09-15',
                'end_date' => '2025-12-01',
                'short_description' => 'Developed a full-stack online booking system for service-based businesses.',
                'phase' => 'complete',
            ],

            // EXTRA VARIETY
            [
                'title' => 'AI Recommendation Engine',
                'start_date' => '2026-04-15',
                'end_date' => '2026-08-01',
                'short_description' => 'Build a machine learning-based recommendation engine for personalised user experiences.',
                'phase' => 'development',
            ],

            [
                'title' => 'Security Audit System',
                'start_date' => '2026-02-20',
                'end_date' => '2026-04-30',
                'short_description' => 'Develop a system to audit and monitor security vulnerabilities across applications.',
                'phase' => 'testing',
            ],

            [
                'title' => 'Portfolio Website Builder',
                'start_date' => '2026-03-05',
                'end_date' => '2026-05-25',
                'short_description' => 'Create a platform allowing users to build and deploy personal portfolio websites.',
                'phase' => 'development',
            ],
        ];


        foreach ($projects as $project) {
            Project::create([
                ...$project,
                'user_id' => $users->random()->id, // randomly assign owner
            ]);
        }
    }
}
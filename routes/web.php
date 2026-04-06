<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController ;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::all();
    return view('welcome', compact('projects'));
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    });
    
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/', function () {
            $projectCount = Project::count();
            $userCount = User::count();
            $projectsWithDemo = Project::whereNotNull('demo_link')->count();
            $projectsWithGithub = Project::whereNotNull('github_url')->count();
            $latestProjects = Project::latest()->take(8)->get();
            $latestUsers = User::latest()->take(5)->get();
            return view('dashboard', compact('projectCount', 'userCount', 'projectsWithDemo', 'projectsWithGithub', 'latestProjects', 'latestUsers'));
            })->name('dashboard');
            Route::resource('project',ProjectController::class)->names('project');
            
});

require __DIR__.'/auth.php';

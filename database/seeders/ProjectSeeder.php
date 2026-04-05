<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Project 1',
            'description' => 'Deskripsi project 1',
            'image' => 'https://via.placeholder.com/150',
            'github_url' => 'link github',
            'demo_link' => 'https://example.com/project1',
        ]);
    }
}

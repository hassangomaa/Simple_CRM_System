<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::pagintae(10);
        return view('projects.create', compact('clients'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:projects',
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:projects,name,' . $project->id,
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

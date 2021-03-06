<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    } 
    
    public function store(ProjectRequest $request)
    {
        $parameters = $request->all();
        $parameters['owner_id'] = Auth::user()->id;

        $created = Project::create($parameters);
        // dd(Auth::user());

    }
}

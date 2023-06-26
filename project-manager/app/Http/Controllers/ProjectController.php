<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function filterpage()
    {
        $projects = Project::all();
        return view('projects.filter', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_amount' => 'required|numeric',
            'project_assign_date' => 'required|date',
            'project_release_date' => 'required|date',
        ]);

        Project::create($request->all());

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    public function destroy($id)
   {
     Project::findOrFail($id)->delete();

     return redirect()->back()->with('success', 'Project deleted successfully.');
   }

    public function filter(Request $request)
    {
        $assignFromDate = $request->input('assign_from_date');
        $assignToDate = $request->input('assign_to_date');
        $releaseFromDate = $request->input('release_from_date');
        $releaseToDate = $request->input('release_to_date');

    $assignSum = Project::whereBetween('project_assign_date', [$assignFromDate, $assignToDate])->sum('project_amount');
    $releaseSum = Project::whereBetween('project_release_date', [$releaseFromDate, $releaseToDate])->sum('project_amount');

    $percentage = 0; // Default value in case $assignSum is zero
    if ($assignSum != 0) {
        $percentage = ($releaseSum / $assignSum) * 100;
    }

    $projects = Project::whereBetween('project_assign_date', [$assignFromDate, $assignToDate])
        ->orWhereBetween('project_release_date', [$releaseFromDate, $releaseToDate])
        ->get();

    return view('projects.filter', compact('projects', 'percentage'));
    }
}

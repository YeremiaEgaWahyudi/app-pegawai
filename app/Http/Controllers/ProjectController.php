<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employee;
use GuzzleHttp\Handler\Proxy;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('employees')->latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:projects',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:planning,in_progress,completed',
            'quota' => 'required|integer|min:1',
        ]);

        Project::create($validate);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('employees');
        $availableEmployees = Employee::whereNotIn('id', $project->employees->pluck('id'))->get();
        return view('projects.show', compact('project', 'availableEmployees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load('employees');
        $availableEmployees = Employee::whereNotIn('id', $project->employees->pluck('id'))->get();
        return view('projects.edit', compact('project', 'availableEmployees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:projects,name,' . $project->id,
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:planning,in_progress,completed',
            'quota' => 'required|integer|min:1',
        ]);

        $project->update($validate);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus');
    }

    public function addEmployee(Request $request, Project $project)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'role' => 'nullable|string|max:100',
        ]);

        if (!$project->hasAvailableQuota()) {
            return redirect()->back()
                ->with('error', 'Quota project sudah penuh');
        }

        $checkExists = $project->employees()->where('employee_id', $validated['employee_id'])->exists();
        if ($checkExists) {
            return redirect()->back()
                ->with('error', 'Employee sudah ada di project ini');
        }

        $project->employees()->attach($validated['employee_id'], [
            'role' => $validated['role'] ?? null,
            'status' => 'aktif',
            'joined_at' => now(),
        ]);

        return redirect()->back()
            ->with('success', 'Employee berhasil ditambahkan ke project');
    }

    public function removeEmployee(Project $project, Employee $employee)
    {
        $project->employees()->detach($employee);

        return redirect()->back()
            ->with('success', 'Employee berhasil dihapus dari project');
    }
}

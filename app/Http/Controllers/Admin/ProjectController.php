<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        $validated_data = $request->validated();

        if($request->hasFile('cover_image')) {
            $path = Storage::put('cover', $request->cover_image);
            $validated_data['cover_image'] = $path;
        }

        $newProject = Project::create($validated_data);

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.show', ['project' => $newProject->slug])
        ->with('status', 'Success! Project created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated_data = $request->validated();

        // $validated_data['slug'] = Project::generateSlug($request->title);

        if ($request->hasFile('cover_image')) {

            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::put('cover', $request->cover_image);
            $validated_data['cover_image'] = $path;

        }

        $project->technologies()->sync($request->technologies);

        $project->update($validated_data);

        return to_route('admin.projects.show', ['project' => $project->slug])
        ->with('status', 'Success! Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index');
    }

    public function deleteImg(Project $project)
    {
        if ($project->cover_image){
            Storage::delete($project->cover_image);
            $project->cover_image = null;
            $project->save();
        }

        return to_route('admin.projects.edit', $project->slug);
    }
}

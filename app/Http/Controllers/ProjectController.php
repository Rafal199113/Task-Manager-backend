<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProjectResource;
use App\Models\User;
use App\Models\Project\Project;
use App\Models\Project\Statuses;
use Spatie\Permission\Models\Permission;

class ProjectController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectResource::collection(Project::all()->load('relationOwner', 'relationLead', 'relationStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $user = auth()->user();


        $project->fill($request->all());
        $project->id_owner = $user->id_user;
        $project->id_lead = $user->id_user;
        $project->id_project_statuses = Statuses::where('ps_slug', 'new')->first()->id_project_statuses;
        $project->save();

        $project->load('relationOwner', 'relationLead');

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}

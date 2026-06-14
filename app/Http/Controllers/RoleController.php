<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\RoleResource;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Module;
use Spatie\Permission\Models\Permission;

class RoleController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
              $response = [];
       $role = Role::with(['users' => function ($q) {
    $q->distinct();
}])->with('permissions')->find($id);
        $response['roles'] = $role;
        $response['modules'] = Module::all();
        $response['permissions'] = Permission::all();

        return new RoleResource($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $role = Role::findOrFail($id);

        $role->fill($request->except('permissions'));
        $role->save();

        $permissions = collect($request->permissions)
            ->flatten()
            ->values()
            ->toArray();

        $role->syncPermissions($permissions);

        return new RoleResource($role->load('permissions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}

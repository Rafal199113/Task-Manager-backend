<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            
        return UserResource::collection(
            User::orderBy('id_user')->with('roles.permissions')->active($request->input('active'))->get()
        );
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
        $user = User::find($id)->load("roles");
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$request->password) {
            $user->fill($request->except('password', 'roles'));
        } else {
            $user->fill($request->except('roles'));
        }
        $user->save();

        if (isset($request->roles)) {
            $user->syncRoles(
                $request->roles
            );
        }

        $user->load('roles');

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMe(string $id)
    {
        $user = User::with('roles.permissions')
    ->findOrFail($id);

        return new UserResource( $user);
    }

    public function updatePremissions(Request $request, int $id)
    {

    }
}

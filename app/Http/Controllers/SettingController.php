<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\SettingPositonsResource;
use App\Http\Resources\SettingResource;
use App\Models\SettingPosition;
use App\Models\Setting;
use Spatie\Permission\Models\Role;
use App\Models\Module;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Setting\StoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Support\ErrorContainer;

class SettingController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return SettingResource::collection(Setting::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Setting $setting, SettingPosition $position)
    {
        $position = $position
        ->where('id_settings_positions', $request->id_setting_position)
        ->firstOrFail();

        $setting = $setting
            ->where('id_user', $request->id_user)
            ->where('id_setting_position', $request->id_setting_position)
            ->first() ?? $setting;

        $setting->fill($request->all());
        $setting->id_setting_position = $request->id_setting_position;
        $setting->setting_short_name = $position->settings_positions_key;
        $setting->save();

        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Setting::where('id_user', $id)->get();
     
        return SettingResource::collection($response);
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

    public function settingPositionsIndex(SettingPosition $positions)
    {
        return new SettingPositonsResource($positions->all());
    }
}

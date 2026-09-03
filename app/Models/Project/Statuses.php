<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'project_statuses';
    protected $primaryKey = 'id_project_statuses';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'id_project',
        'ps_name',
        'ps_slug',
        'ps_color',
    ];
}

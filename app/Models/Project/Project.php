<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project\Statuses;

class Project extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'projects';
    protected $primaryKey = 'id_project';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'p_name',
        'p_key',
        'p_description',
        'id_owner',
        'id_lead',
        'p_repository',
        'p_start_date',
        'p_end_date',
        'p_priority',
        'id_project_statues'
    ];

    public function relationOwner()
    {
        return $this->belongsTo(User::class, 'id_owner', 'id_user');
    }

    public function relationLead()
    {
        return $this->belongsTo(User::class, 'id_lead', 'id_user');
    }

    public function relationStatus()
    {
        return $this->belongsTo(Statuses::class, 'id_project_statuses', 'id_project_statuses');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class ModulePosition extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'module_position';
    protected $primaryKey = 'id_module_position';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'm_name_position_name'
    ];

}

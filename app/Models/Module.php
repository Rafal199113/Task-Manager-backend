<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModulePosition;

class Module extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'module';
    protected $primaryKey = 'id_module';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'm_name'
    ];

    public function relationModulePosition(): HasMany
    {
        return $this->hasMany(ModulePosition::class , 'id_module' , 'id_module_position');
    }

}

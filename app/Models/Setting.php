<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModulePosition;

class Setting extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'settings';
    protected $primaryKey = 'id_settings';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'id_user',
        'id_setting_position',
        'setting_short_name',
        'setting_value'
    ];

    public function relationModulePosition(): HasMany
    {
        return $this->hasMany(ModulePosition::class , 'id_module' , 'id_module_position');
    }

}

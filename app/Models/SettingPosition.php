<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModulePosition;

class SettingPosition extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'settings_positions';
    protected $primaryKey = 'id_settings_positions';
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'settings_positions_position',
        'settings_positions_key',
        'settings_positions_key',
    ];

    public function relationModulePosition(): HasMany
    {
        return $this->hasMany(ModulePosition::class , 'id_module' , 'id_module_position');
    }

}

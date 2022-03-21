<?php

namespace Amuone\RolePermission\Models;

use App\Traits\HasValidator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    use HasValidator;

    protected $fillable = ['name'];

    public const AVAILABLE = [
        'read-available-permission',
        'read-permission',
        'create-permission',
        'update-permission',
        'delete-permission',
        'more will be added in the future.'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permission');
    }
}

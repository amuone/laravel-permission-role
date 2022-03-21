<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model class for roles table
 */
class Role extends Model
{
    use HasFactory;

    /**
     * Fillable columns for mass assignment
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Capitalize role's name
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords($value),
        );
    }

    /**
     * Get role's permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    /**
     * Get role's users
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}

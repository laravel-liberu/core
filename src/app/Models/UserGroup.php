<?php

namespace LaravelEnso\Core\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Rememberable\app\Traits\Rememberable;
use LaravelEnso\Roles\app\Traits\HasRoles;
use LaravelEnso\Tables\app\Traits\TableCache;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class UserGroup extends Model
{
    use HasRoles, Rememberable, TableCache;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function delete()
    {
        if ($this->users()->exists()) {
            throw new ConflictHttpException(
                __("The user group has users attached and can't be deleted")
            );
        }

        parent::delete();
    }

    public function scopeVisible($query)
    {
        return Auth::user()->belongsToAdminGroup()
            ? $query
            : $query->whereId(Auth::user()->group_id);
    }
}

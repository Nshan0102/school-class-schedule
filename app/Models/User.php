<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @property $name
 * @property $surname
 * @property $profession
 * @property $email
 * @mixin BaseModel
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use Filterable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'profession',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return in_array("admin", $this->roles()->pluck("name")->toArray());
    }

    public function isTeacher(): bool
    {
        return in_array("teacher", $this->roles()->pluck("name")->toArray());
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, "user_id", "id");
    }
}

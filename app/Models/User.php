<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasLocalePreference, MustVerifyEmail
{
    use HasFactory, HasAdvancedFilter, Notifiable, SoftDeletes;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'name',
        'firstname',
        'email',
        'password',
        'locale',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'id',
        'name',
        'firstname',
        'email',
        'email_verified_at',
        'locale',
    ];

    public $filterable = [
        'id',
        'name',
        'firstname',
        'email',
        'email_verified_at',
        'roles.title',
        'locale',
    ];

    protected $appends = ['total_points', 'sports_points'];

    public function getTotalPointsAttribute()
    {
        return $this->attributes['total_points'] ?? 0;
    }

    public function setTotalPointsAttribute($value)
    {
        $this->attributes['total_points'] = $value;
    }

    public function getSportsPointsAttribute()
    {
        return $this->attributes['sports_points'] ?? [];
    }

    public function setSportsPointsAttribute($value)
    {
        $this->attributes['sports_points'] = $value;
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function pronostics()
    {
        return $this->hasMany(Pronostic::class);
    }

    public function leagues()
    {
        return $this->belongsToMany(League::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}

<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'leagues';

    protected $fillable = [
        'title',
        'competition_id',
    ];

    public $orderable = [
        'id',
        'title',
        'competition.title',
    ];

    public $filterable = [
        'id',
        'title',
        'user.name',
        'competition.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function pronostic()
    {
        return $this->hasManyThrough(Pronostic::class, User::class);
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class);
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
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

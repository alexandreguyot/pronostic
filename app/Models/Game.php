<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'games';

    protected $dates = [
        'date_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'competition_id',
        'tour',
        'date_time',
        'home_team_id',
        'home_score',
        'exterior_team_id',
        'exterior_score',
        'sport_id',
    ];

    public $orderable = [
        'id',
        'competition.title',
        'tour',
        'date_time',
        'home_team.name',
        'home_score',
        'exterior_team.name',
        'exterior_score',
        'sport.title',
    ];

    public $filterable = [
        'id',
        'competition.title',
        'tour',
        'date_time',
        'home_team.name',
        'home_score',
        'exterior_team.name',
        'exterior_score',
        'sport.title',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function getDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class);
    }

    public function exteriorTeam()
    {
        return $this->belongsTo(Team::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
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

<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pronostic extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'pronostics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'game_id',
        'score_home',
        'score_exterior',
        'points',
    ];

    public $orderable = [
        'id',
        'game.date_time',
        'game.home_score',
        'game.exterior_score',
        'score_home',
        'score_exterior',
        'points',
    ];

    public $filterable = [
        'id',
        'game.date_time',
        'game.home_score',
        'game.exterior_score',
        'score_home',
        'score_exterior',
        'points',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
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

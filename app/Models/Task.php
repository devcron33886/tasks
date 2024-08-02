<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'team_id',
        'user_id',
        'student_id',
        'name',
        'description',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('teams_tasks', function (Builder $builder) {
            $builder->where('team_id', auth()->user()->team_id);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

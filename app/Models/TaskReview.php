<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'team_id',
        'user_id',
        'link',
        'description',
        'status',
    ];

    protected static function booted()
    {
        static::addGlobalScope('teams_tasks_review', function (Builder $builder) {
            $builder->where('team_id', auth()->user()->team_id);
        });

    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

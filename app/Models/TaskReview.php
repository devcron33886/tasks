<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskReview extends Model
{
    use HasFactory;

    protected $fillable=[
        'task_id',
        'supervisor_id',
        'team_id',
        'student_id',
        'link',
        'description',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);   
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class);   
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);   
    }
}

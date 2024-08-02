<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'link',
        'description',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}

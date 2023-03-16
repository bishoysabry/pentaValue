<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;
     public function tasks(): HasMany
    {
        return $this->HasMany(Task::class,'job_id');
    }
    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class,'project_id');
    }
}

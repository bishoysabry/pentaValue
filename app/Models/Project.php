<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    public function jobs(): HasMany
    {
        return $this->HasMany(Job::class,'project_id');
    }
    public function account(): BelongsTo
    {
        return $this->BelongsTo(Account::class,'account_id');
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['score', 'max_score', 'user_id', 'quiz_id'];

    public function user (): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function quiz (): BelongsTo{
        return $this->belongsTo(Quiz::class);
    }
}
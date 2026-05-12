<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'answer', 'correct'];

    public function question(): BelongsTo{
        return $this->belongsTo(Question::class);
    }
}

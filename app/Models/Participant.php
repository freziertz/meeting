<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'user_id',
        'meeting_role_id',
        'title',
        'group_id'
    ];


    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }
}

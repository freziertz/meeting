<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Participant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'participantable_id', // meetng_id
        'participantable_type',
        'participant_id',  // responsible user id
        'meeting_role_id',
        'title',
        'group_id',
        'created_by',
        'account_id'

    ];


    // public function meeting(): BelongsTo
    // {
    //     return $this->belongsTo(Meeting::class);
    // }

    public function participantable(): MorphTo
    {
        return $this->morphTo();
    }
}

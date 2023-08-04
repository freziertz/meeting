<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;


class Participant extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'participantable_id', // meetng_id
        'participantable_type',
        'participant_id',  // responsible user id
        'meeting_role_id',
        'title',
        'status',
        'comment',
        'group_id',
        'created_by',
        'account_id'

    ];


    // public function meeting(): BelongsTo
    // {
    //     return $this->belongsTo(Meeting::class);
    // }
    // protected function fulllName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //     );
    // }

    protected $attributes = [
        'status' => false,
    ];

    public function participantable(): MorphTo
    {
        return $this->morphTo();
    }

    public function meeting_role(): BelongsTo
    {
        return $this->belongsTo(MeetingRole::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_id');
    }
}

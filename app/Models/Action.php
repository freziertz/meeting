<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'agenda_id',
        'name',
        'meeting_id',
        'due_date',
        // 'as_of_date',
        // 'status_id',
        // 'notes',
        'created_by',
        'account_id'
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function reminders(): MorphMany
    {
        return $this->morphMany(Reminder::class, 'reminderable');
    }

    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'participantable');
    }


}

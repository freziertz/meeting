<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Resolution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'subject',
        'notes_to_voters',
        'voting_deadline',
        'uuid',
        'visible',
        'status',
        'slug',
        'created_by',
        'account_id'
    ];

    // public function meeting(): BelongsTo
    // {
    //     return $this->belongsTo(Meeting::class);
    // }
    protected $attributes = [
        'visible' => false,
        'status' => 1,
    ];

    public function documents(): MorphToMany
    {
        return $this->morphToMany(Document::class, 'documentable');
    }

    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'participantable');
    }

    public function organizers(): MorphMany
    {
        return $this->morphMany(Organizer::class, 'organizable');
    }

    public function contributors(): MorphMany
    {
        return $this->morphMany(Contributor::class, 'contributable');
    }

    public function agendas(): MorphMany
    {
        return $this->morphMany(Agenda::class, 'agendable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}

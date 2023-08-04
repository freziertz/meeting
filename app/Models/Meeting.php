<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Enums\MeetingStatusEnum;

class Meeting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'meeting_type_id',
        'title',
        'venue',
        'google_map_url',
        'timezone_id',
        'description',
        'participants_notes',
        'organizer_notes',
        // 'reminder',
        'status',
        'uuid',
        'visible',
        'slug',
        'created_by', // organizer id, user id
        'account_id'
    ];

    //default value

    protected $attributes = [
        'visible' => false,
        'status' => 1,
    ];


    //Retun slug instead of meeting id

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    protected $casts = [
        'status' => MeetingStatusEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    // public function organizers(): HasMany
    // {
    //     return $this->hasMany(Organizer::class);
    // }

    // public function participants(): HasMany
    // {
    //     return $this->hasMany(Participant::class);
    // }

    // public function contributors(): HasMany // Agenda Contributors
    // {
    //     return $this->hasMany(Contributor::class);
    // }

    public function reminders(): MorphMany
    {
        return $this->morphMany(Reminder::class, 'reminderable');
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



    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    // Meeting has document through agenda


    // public function documents(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Document::class, Agenda::class,'agendable_id','documentable_id','id','id' );
    // }

    public function scopeOrderByName($query)
    {
        $query->orderBy('meetings.created_at')->orderBy('meetings.created_at');
    }



    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');

            });


        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}

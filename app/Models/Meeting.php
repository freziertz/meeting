<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'reminder',
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
    ];


    //Retun slug instead of meeting id

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function organizers(): HasMany
    {
        return $this->hasMany(Organizer::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function contributors(): HasMany // Agenda Contributors
    {
        return $this->hasMany(Contributor::class);
    }

    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}

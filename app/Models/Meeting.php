<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meeting extends Model
{
    use HasFactory;

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
        'status'
    ];


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

}

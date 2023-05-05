<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class ReviewRoom extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'account_id'
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
        return $this->morphMany(Organizer::class, 'orgnizable');
    }

    public function contributors(): MorphMany
    {
        return $this->morphMany(Contributor::class, 'contributable');
    }

    public function agendas(): MorphMany
    {
        return $this->morphMany(Agenda::class, 'agendable');
    }
}

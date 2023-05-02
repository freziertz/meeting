<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'presenter_id',
        'meeting_id',
        'contributor_id',
        'minutes',
        'purpose_id',
        'external_url',
        'recurring',
        'created_by',
        'account_id'
    ];


    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }


    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function presenter()
    {
        $presenter = User::find($this->presenter_id)->value('name');

        return $presenter;
    }


    public function contributor()
    {
        $contributor = User::find($this->contributor_id)->value('name');

        return $contributor;
    }

    public function purpose()
    {
      return $this->belongsTo(Purpose::class, 'name', 'purpose_id');
    }


    public function getPurposeNameAttribute()
    {
        return Purpose::find($this->purpose_id)->value('name');
    }




}

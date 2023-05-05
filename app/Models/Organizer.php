<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Organizer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'organizable_id', // meeting_id
        'organizable_type',
        'primary',
        'title',
        'organizer_id',  // responsible user id
        'created_by',
        'account_id'
    ];


    // public function meeting(): BelongsTo
    // {
    //     return $this->belongsTo(Meeting::class);
    // }

    public function organizable(): MorphTo
    {
        return $this->morphTo();
    }
}

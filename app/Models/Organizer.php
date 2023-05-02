<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Organizer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'meeting_id',
        'primary',
        'title',
        'organizer_id',  // responsible user id
        'created_by',
        'account_id'
    ];


    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }
}

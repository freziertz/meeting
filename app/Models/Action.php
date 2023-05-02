<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'agenda_id',
        'name',
        'actioner_id', // responsible user id
        'meeting_id',
        'due_date',
        'days',
        'status',
        'as_off_date',
        'created_by',
        'account_id'
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }
}

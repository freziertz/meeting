<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resolution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'subject',
        'meeting_id',
        'note_to_voters',
        'voting_deadline',
        'created_by',
        'account_id'
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }
}

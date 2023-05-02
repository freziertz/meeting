<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contributor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'meeting_id',
        'contributor_id',  // contributor user id
        'title',
        'created_by',
        'account_id'
    ];


    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

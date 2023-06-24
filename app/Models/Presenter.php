<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Presenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'presenter_id',
        'agenda_id',
        'meeting_id',
        'account_id',
        'created_by'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'presenter_id');
    }
}

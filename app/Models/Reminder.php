<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reminderable_id',
        'reminder_date',
        'reminder_type_id',
        'reminder',
        'created_by',
        'account_id'
    ];


    public function reminderable(): MorphTo
    {
        return $this->morphTo();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'notifiable_id',
        'notification_date',
        'notification_type_id',
        'reminder',
        'created_by',
        'account_id'
    ];


    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }
}

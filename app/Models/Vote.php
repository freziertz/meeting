<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'agender_id',
        'subject',
        'created_by',
        'account_id'
    ];
}

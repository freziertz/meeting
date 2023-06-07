<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;


    protected $fillable = [
        'meeting_id',
        'meeting_date',
        'meeting_start_time',
        'meeting_end_time',
        'primary',
        'created_by',
        'account_id'
    ];

    protected $casts = [
        'meeting_start_time' => TimeCast::class,
        'meeting_end_time' => TimeCast::class
    ];



    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory;   

    protected $fillable = [
        'title',
        'content',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'created_by',
        'account_id'
    ];
}

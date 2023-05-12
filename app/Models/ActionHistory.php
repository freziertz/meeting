<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_id',
        'status_id',
        'notes',
        'as_of_date',
        'created_by',
        'account_id'
    ];
}

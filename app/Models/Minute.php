<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minute extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'agenda_id',
        'document_id',
        'title',
        'body',
        'created_by',
        'account_id'
    ];
}

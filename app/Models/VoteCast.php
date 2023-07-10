<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteCast extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'agenda_id',
        'vote_id',
        'voter_id',
        'choice',
        'decription'
    ];
}

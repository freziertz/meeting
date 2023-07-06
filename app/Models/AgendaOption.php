<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaOption extends Model
{
    use HasFactory;


    protected  $fillable = [

        'agenda_number_prefix',
        'agenda_number_suffix',
        'starting_agenda_number',
        'schedule_disposal',// retention of agenda item - delete all annotations, no action, delete files, deny access to file exeptedd, delete all
        'days_after_meeting',
        'on_date',
        'separator',  // after below agenda

        //add agenda
        //add all
        // remove all - reset

    ];
}

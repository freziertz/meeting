<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purpose extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'description',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function agenda()
    {
        return $this->hasOne(Agenda::class, 'name', 'purpose_id');
    }

 


   

}

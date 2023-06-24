<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
            'name',
            'description',
            'uuid',
            'path',
            'filename',
            'extension',
            'mime_type',
            'webpath',
            'fullpath',
            'size',
            'signature',
            'created_by',
            'account_id'
    ];

    // protected $appends = array('agenda_id');


    public function agendas(): MorphToMany
    {
        return $this->morphedByMany(Agenda::class, 'documentable');
    }
    


    public function resolutions(): MorphToMany
    {
        return $this->morphedByMany(Resolution::class, 'documentable');
    }

    public function review_rooms(): MorphToMany
    {
        return $this->morphedByMany(ReviewRoom::class, 'documentable');
    }
}

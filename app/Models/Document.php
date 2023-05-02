<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}

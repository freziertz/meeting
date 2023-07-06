<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'uuid',
        'created_by',
        'shor_name',
        'pobox',
        'location',
        'ward',
        'district',
        'region',
        'country',
        // 'street',
        'house_no',
        'telephone',
        'email',
        'website',
        'logo',
        'base_color',
        'secondary_color',
        'third_color'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('name')->orderBy('name');
    }



    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');

            });


        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}

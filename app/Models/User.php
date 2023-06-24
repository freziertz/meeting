<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'initials',
        'designation',
        'organization_id',
        'storage_limit',
        'pa_email',
        'send_welcome_email',
        'send_start_guide',
        'owner',
        'created_by',
        'account_id'
    ];

    protected $guard_name = 'sanctum';


    // $meetings = User::find(1)->meetings;

    // foreach ($meetings as $meeting) {
    //     // ...
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];







    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }


    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class,'created_by');
    }



    public function presenters(): HasMany
    {
        return $this->hasMany(Presenter::class, 'presenter_id');
    }

    public function organizers(): HasMany
    {
        return $this->hasMany(Organizer::class,'organizer_id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function contributors(): HasMany
    {
        return $this->hasMany(Contributor::class,'contributer_id');
    }



    public function actions(): HasMany
    {
        return $this->hasMany(Action::class,'actioner_id');
    }

    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class,'created_by');
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class,'created_by');
    }

    public function directories(): HasMany
    {
        return $this->hasMany(Directory::class, 'created_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'created_by');
    }

    public function meeting_roles(): HasMany
    {
        return $this->hasMany(MeetingRole::class,'created_by');
    }

    public function meeting_types(): HasMany
    {
        return $this->hasMany(MeetingType::class,'created_by');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class,'created_by');
    }

    public function purposes(): HasMany
    {
        return $this->hasMany(Purpose::class,'created_by');
    }

    public function resolutions(): HasMany
    {
        return $this->hasMany(Resolution::class,'created_by');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class,'created_by');
    }

    public function review_rooms(): HasMany
    {
        return $this->hasMany(ReviewRoom::class,'created_by');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class,'created_by');
    }


    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }



    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    // }

    public function isDemoUser()
    {
        return $this->email === 'johndoe@example.com';
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('last_name')->orderBy('first_name');
    }

    public function scopeWhereRole($query, $role)
    {
        switch ($role) {
            case 'user': return $query->where('owner', false);
            case 'owner': return $query->where('owner', true);
        }
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        })->when($filters['role'] ?? null, function ($query, $role) {
            $query->whereRole($role);

        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }


}

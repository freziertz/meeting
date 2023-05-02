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


class User extends Authenticatable
{
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
        'created_by',
        'account_id'
    ];


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
        return $this->hasMany(Participant::class,'participant_id');
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


}

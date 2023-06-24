<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use App\Policies\MeetingPolicy;
use App\Policies\PurposePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,

        Meeting::class => MeetingPolicy::class,

        Purpose::class => PurposePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}

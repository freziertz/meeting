<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {

        $user = Auth::user();

        return array_merge(parent::share($request), [
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'failed' => fn () => $request->session()->get('failed'),
            ],

            'permissions' => [
                'list_roles' => true,
                'create_roles'=> true,
                'edit_roles'=> true,
                'delete_roles'=> true,

                'list_users'=> true,
                'create_users'=> true,
                'edit_users'=> true,
                'delete_users'=> true,

                'list_accounts'=> true,
                'create_accounts'=> true,
                'edit_accounts'=> true,
                'delete_accounts'=> true,

                'list_actions'=> true,
                'create_actions'=> true,
                'edit_actions'=> true,
                'delete_actions'=> true,

                'list_action_histories'=> true,
                'create_action_histories'=> true,
                'edit_action_histories'=> true,
                'delete_action_histories'=> true,

                'list_action_status'=> true,
                'create_action_status'=> true,
                'edit_action_status'=> true,
                'delete_action_status'=> true,

                'list_agendas'=> true,
                'create_agendas'=> true,
                'edit_agendas'=> true,
                'delete_agendas'=> true,

                'list_agenda_options'=> true,
                'create_agenda_options'=> true,
                'edit_agenda_options'=> true,
                'delete_agenda_options'=> true,

                'list_announcements'=> true,
                'create_announcements'=> true,
                'edit_announcements'=> true,
                'delete_announcements'=> true,

                'list_contributors'=> true,
                'create_contributors'=> true,
                'edit_contributors'=> true,
                'delete_contributors'=> true,

                'list_directories'=> true,
                'create_directories'=> true,
                'edit_directories'=> true,
                'delete_directories'=> true,

                'list_documents'=> true,
                'create_documents'=> true,
                'edit_documents'=> true,
                'delete_documents'=> true,

                'list_groups'=> true,
                'create_groups'=> true,
                'edit_groups'=> true,
                'delete_groups'=> true,

                'list_meetings'=> true,
                'create_meetings'=> true,
                'edit_meetings'=> true,
                'delete_meetings'=> true,

                'list_meeting_roles'=> true,
                'create_meeting_roles'=> true,
                'edit_meeting_roles'=> true,
                'delete_meeting_roles'=> true,

                'list_meeting_types'=> true,
                'create_meeting_types'=> true,
                'edit_meeting_types'=> true,
                'delete_meeting_types'=> true,


                'list_notifications'=> true,
                'create_notifications'=> true,
                'edit_notifications'=> true,
                'delete_notifications'=> true,

                'list_organizers'=> true,
                'create_organizers'=> true,
                'edit_organizers'=> true,
                'delete_organizers'=> true,

                'list_participants'=> true,
                'create_participants'=> true,
                'edit_participants'=> true,
                'delete_participants'=> true,

                'list_presenters'=> true,
                'create_presenters'=> true,
                'edit_presenters'=> true,
                'delete_presenters'=> true,

                // $request->user()->can('create', Purpose::class)

                'list_purposes'=> true,
                'create_purposes'=> true,
                'edit_purposes'=> true,
                'delete_purposes'=> true,

                'list_resolutions'=> true,
                'create_resolutions'=> true,
                'edit_resolutions'=> true,
                'delete_resolutions'=> true,

                'list_review_rooms'=> true,
                'create_review_rooms'=> true,
                'edit_review_rooms'=> true,
                'delete_review_rooms'=> true,

                'list_schedules'=> true,
                'create_schedules'=> true,
                'edit_schedules'=> true,
                'delete_schedules'=> true,

                'list_settings'=> true,
                'create_settings'=> true,
                'edit_settings'=> true,
                'delete_settings'=> true,

                'list_votes'=> true,
                'create_votes'=> true,
                'edit_votes'=> true,
                'delete_votes'=> true,
            ],
        ]);
    }
}

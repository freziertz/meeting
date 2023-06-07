<?php

namespace App\Policies;

use App\Models\Meeting;
use App\Models\Organizer;
use App\Models\Participant;
use App\Models\Presenter;
use App\Models\Contributor;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class MeetingPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    // public $meeting;

    // public function __construct(Meeting $meeting)
    // {
    //     $this->meeting = $meeting;
    // }

     public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list meetings');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Meeting $meeting): bool
    {
        return $user->hasPermissionTo('list meetings', $meeting);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create meetings');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', $meeting->id)
        ->where( 'participant_id', $user->id )
        ->where('participantable_type',  'App\Models\Meeting')
        ->where('deleted_at', NULL)
        ->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('edit meetings') && ( $meeting_role || $organizer ) ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);
        return $user->hasPermissionTo('delete meetings') && ( $meeting_role || $organizer );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Meeting $meeting): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Meeting $meeting): bool
    {
        return true;
    }

    public function own(User $user, Meeting $meeting): bool
    {
        return $user->id === $meeting->created_by;
    }

    public function organize(User $user, Meeting $meeting): bool
    {
        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();



        return in_array($user->id, $organizer_ids);
    }

    public function organizeMeeting(User $user, Meeting $meeting): bool
    {
        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)
        ->orWhere('visible', true)
        ->pluck('organizer_id')->toArray();

        return in_array($user->id, $organizer_ids);
    }

    public function participate(User $user, Meeting $meeting): bool
    {
        $participant_ids = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('participant_id')->toArray();

        return in_array($user->id, $participant_ids);
    }

    public function chair(User $user, Meeting $meeting): bool
    {
        $chair = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('meeting_role_id', '=', 1)
        ->where('deleted_at', NULL)->first();

        return $chair;
    }

    public function secretary(User $user, Meeting $meeting): bool
    {
        $secretary = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('meeting_role_id', '=', 2)
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->first();

        return $secretary;
    }

    public function contribute(User $user, Meeting $meeting): bool
    {
        $contributor_ids = Contributor::where('contributable_id', '=', $meeting->id)
        ->where('contributable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('contributor_id')->toArray();

        return in_array($user->id, $contributor_ids);
    }

    public function publish(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('publish meetings') && ( $meeting_role || $organizer );

    }

    public function start(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('start meetings') && ( $meeting_role || $organizer );

    }

    public function close(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('close meetings') && ( $meeting_role || $organizer );
    }

    public function reset(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('reset meetings') && ( $meeting_role || $organizer );
    }

    public function join(User $user, Meeting $meeting): bool
    {
        $participant_ids = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('participant_id')->toArray();

        return in_array($user->id, $participant_ids);
    }

    public function pause(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('pause meetings') && ( $meeting_role || $organizer );

    }

    public function exportMeetingPack(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('export meetings_packs') && ( $meeting_role || $organizer );

    }

    public function sendMeetingPack(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('send meetings_packs') && ( $meeting_role || $organizer );

    }

    public function exportMeetingMinutes(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('export meeting_minutes') && ( $meeting_role || $organizer );

    }

    public function sendMeetingMinutes(User $user, Meeting $meeting): bool
    {
        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        $organizer_ids = Organizer::where('organizable_id', '=', $meeting->id)
        ->where('organizable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('organizer_id')->toArray();

        $organizer = in_array($user->id, $organizer_ids);

        return $user->hasPermissionTo('send meetings_minutes') && ( $meeting_role || $organizer );

    }

    public function assignPresenter(User $user, Meeting $meeting): bool
    {

        $meeting_role_id = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where( 'participant_id', $user->id )
        ->where('deleted_at', NULL)->value('meeting_role_id');

        $meeting_role = in_array($meeting_role_id, [1,2]);

        return $meeting_role;
    }

    public function addShareAnnotation(User $user, Meeting $meeting): bool
    {
        $participant_ids = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('participant_id')->toArray();

        return in_array($user->id, $participant_ids);
    }

    public function addPrivateAnnotation(User $user, Meeting $meeting): bool
    {
        $participant_ids = Participant::where('participantable_id', '=', $meeting->id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->pluck('participant_id')->toArray();

        return in_array($user->id, $participant_ids);
    }


}

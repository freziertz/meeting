<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Meeting;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Organizer;
use App\Models\Document;
use App\Models\Minute;
use App\Models\Participant;
use App\Models\Group;
use App\Models\ActionStatus;
use App\Models\MeetingRole;
use App\Models\Purpose;
use App\Models\MeetingType;
use App\Models\Schedule;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreMeetingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

use App\Traits\InteractsWithBanner;
use App\Enums\MeetingStatusEnum;



use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

//Notification
use App\Notifications\MeetingPublishedNotification;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingPublished;
use App\Mail\MeetingStarted;
use App\Mail\MeetingClosed;
use App\Jobs\SendMeetingStartedEmailsJob;
use App\Jobs\SendMeetingClosedEmailsJob;

use App\Jobs\SendMeetingPublishedEmailsJob;
use App\Models\Contributor;

use function PHPUnit\Framework\isNull;

class LiveController extends Controller
{
    public function show(Request $request, string $meeting_id, string $agenda_id = null, string $document_id = null )
    {

        $users = User::all();

        $participant_id = Auth::user()->id;

        $participant = Participant::where('participant_id' , $participant_id)
        ->where('participantable_id', $meeting_id)->first();



        $participant->status = 1;


        $participant->save();






        $meeting = DB::table('meetings')
            ->join('meeting_types', 'meeting_types.id', '=', 'meetings.meeting_type_id')
            ->join('schedules', 'schedules.meeting_id', '=', 'meetings.id')
            ->select(
                'meetings.*',
                'meeting_types.name as meeting_type',
                'schedules.meeting_date',
                'schedules.meeting_start_time',
                'schedules.meeting_end_time'
            )->distinct()
            ->where('meetings.id', '=', $meeting_id)
            ->where('meetings.deleted_at', NULL)
            ->first();










        $participants = DB::table('participants')
                       ->join('meetings', 'meetings.id', '=', 'participants.participantable_id')
                       ->join('users', 'users.id', '=', 'participants.participant_id')
                       ->join('meeting_roles', 'meeting_roles.id', '=', 'participants.meeting_role_id')
                       ->join('groups', 'groups.id', '=', 'participants.group_id')
                       ->select(
                             'participants.id',
                             'participants.meeting_role_id',
                             'participants.group_id',
                             'participants.status',
                             'participants.title as designation',
                             'groups.name as group_name',
                             'meeting_roles.name as meeting_role_name',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',
                          )->where('meetings.id', '=', $meeting_id)
                          ->where('participants.participantable_type', '=', 'App\Models\Meeting')
                          ->where('participants.deleted_at', NULL)
                       ->get();







        $agendas = DB::table('agendas')
           ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
        //    ->join('presenters', 'presenter_id', '=', 'agendas.presenter_id')
        //    ->join('contributor', 'contributor_id', '=', 'agenda.contributor_id')
           ->join('users as presenters', 'presenters.id', '=', 'agendas.presenter_id')
           ->join('users', 'users.id', '=', 'agendas.contributor_id')
           ->join('purposes', 'purposes.id', '=', 'agendas.purpose_id')

           ->select(
                  'agendas.*',
                  'presenters.id as presenter_id',
                  'presenters.first_name as pfirst_name',
                  'presenters.middle_name as pmiddle_name',
                  'presenters.last_name as plast_name',
                  'users.first_name',
                  'users.middle_name',
                  'users.last_name',
                  'users.title as Title',
                  'purposes.name as purpose_name'
              )->distinct()->where('meetings.id', '=', $meeting_id)
              ->where('agendas.agendable_type', '=', 'App\Models\Meeting')
              ->where('agendas.deleted_at', NULL)
           ->get();








        $documents = DB::table('documents')
           ->join('documentables', 'documentables.document_id', '=', 'documents.id')
           ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
           ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
           ->select(
            'documents.*',
            'agendas.id as agenda_id',
            'meetings.id as meeting_id'
        )->where('meetings.id', '=', $meeting_id)
        ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
        ->where('documents.deleted_at', NULL)
     ->get();


    //    $documents = $agenda->documents->first();

        if( $agenda_id == 0 && $document_id == 0){

                $agenda = Agenda::where('agendable_id', $meeting_id)
                ->where('agendas.agendable_type', '=', 'App\Models\Meeting')
                ->first();




                $document = DB::table('documents')
                ->join('documentables', 'documentables.document_id', '=', 'documents.id')
                ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
                ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
                ->select(
                'documents.*',
                'agendas.id as agenda_id',
                'meetings.id as meeting_id'
            )->where('meetings.id', '=', $meeting_id)
            ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
            ->where('documents.deleted_at', NULL)
            ->first();

            // $minute =  Minute::where('meeting_id', $meeting_id)
            // ->where('agenda_id', '=', $agenda->id)
            // ->first();




        }else{

            $agenda = Agenda::where('agendable_id', $meeting_id)
            ->where('agendas.agendable_type', '=', 'App\Models\Meeting')
            ->where('agendas.id', '=', $agenda_id)
            ->first();


            $document = DB::table('documents')
            ->join('documentables', 'documentables.document_id', '=', 'documents.id')
            ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
            ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
            ->select(
            'documents.*',
            'agendas.id as agenda_id',
            'meetings.id as meeting_id'
        )->where('meetings.id', '=', $meeting_id)
        ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
        ->where('documents.id', '=', $document_id)
        ->where('documents.deleted_at', NULL)
        ->first();

        $minute =  Minute::where('meeting_id', $meeting_id)
        ->where('agenda_id', '=', $agenda->id)
        ->first();

        }

        if (!isset($minute)){
            $minute = [
                'meeting_id' => $meeting_id,
                'agenda_id' => $agenda->id,
                'document_id'=> $document->id,
                'body' =>"",
                'created_by'=> 0,
                'account_id'=> 0
            ];

        }







        $schedules = DB::table('schedules')
           ->join('meetings', 'meetings.id', '=', 'schedules.meeting_id')
           ->select(
                 'schedules.id',
                 'schedules.meeting_date',
                 'schedules.meeting_start_time',
                 'schedules.meeting_end_time',
                 'meetings.id',
              )->where('meetings.id', '=', $meeting_id)

           ->get();



        $actions = DB::table('actions')
            ->join('meetings', 'meetings.id', '=', 'actions.meeting_id')
            // ->join('users', 'users.id', '=', 'actions.actioner_id')
            ->select(
                    'actions.*',
                )->where('meetings.id', '=', $meeting_id)
                ->where('actions.deleted_at', NULL)
            ->get();


            $mt = Meeting::find($meeting->id);

            $can = [
                'create_organizer' => $request->user()->can('create', Organizer::class),
                'edit_organizer' => $request->user()->can('edit', Organizer::class),
                'list_organizer' => $request->user()->can('list', Organizer::class),


                'create_agenda' => $request->user()->can('create', Agenda::class),
                'edit_agenda' => $request->user()->can('edit', Agenda::class),
                'list_agenda' => $request->user()->can('list', Agenda::class),
                'delete_agenda' => $request->user()->can('delete', $agendas),


                'create_participant' => $request->user()->can('create', Participant::class),
                'edit_participant' => $request->user()->can('edit', Participant::class),
                'list_participant' => $request->user()->can('list', Participant::class),
                'delete_participant' => $request->user()->can('delete', $participants),

                'create_action' => $request->user()->can('create', Action::class),
                'edit_action' => $request->user()->can('edit', Action::class),
                'list_action' => $request->user()->can('list', Action::class),
                'delete_action' => $request->user()->can('delete', $actions),

                'create_meeting' => $request->user()->can('create', Meeting::class),
                'edit_meeting' => $request->user()->can('update', $mt),
                'list_meeting' => $request->user()->can('viewAny', Meeting::class),
                'delete_meeting' => $request->user()->can('delete', $mt),

                'publish_meeting' => $request->user()->can('publish', $mt),
                'start_meeting' => $request->user()->can('start', $mt),
                'close_meeting' => $request->user()->can('close', $mt),
                'pause_meeting' => $request->user()->can('pause', $mt),
                'reset_meeting' => $request->user()->can('reset', $mt),

                'download_files' => $request->user()->can('participate', $mt),
                'send_meeting_pack' => $request->user()->can('organize', $mt),
                'export_meeting_pack' => $request->user()->can('organize', $mt),
                'send_meeting_minutes' => $request->user()->can('organize', $mt),
                'export_meeting_minutes' => $request->user()->can('organize', $mt),

                'organize_meeting' => $request->user()->can('organize', $mt),

                'participate_meeting' => $request->user()->can('participate', $mt),

                'contribute_meeting' => $request->user()->can('contribute', $mt),

                'send_notification' => $request->user()->can('organize', $mt),
                'view_delivery_status' => $request->user()->can('organize', $mt),
                'add_vote' => $request->user()->can('organizeMeeting', $mt),
                'manage_action' => $request->user()->can('organizeMeeting', $mt),
            ];

            // dd($can['publish_meeting']);

            // dd($user->hasPermissionTo('edit meetings'));

            // $user->assignRole('Chairperson', );

            // dd($document->id);




            $meeting_accessed = Meeting::find($meeting_id);


            if (($request->user()->can('viewAny', $meeting_accessed)) &&

            (($request->user()->can('own', $meeting_accessed)) ||


            ($request->user()->can('participate', $meeting_accessed) && $meeting_accessed->visible == true)) )
            {
                // array_push($meetings, $meeting);
                return Inertia::render('Live/Show',compact('meeting', 'agenda','minute','agendas','participants', 'documents',  'actions', 'document', 'can'));

            }else{
                abort(403);

            }


        // return Inertia::render('Live/Show');
    }

    public function join(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        // $participants = DB::table('participants')
        // ->join('users', 'users.id', '=', 'participants.participant_id')
        // ->select(
        //       'users.email',
        //       'users.title',
        //       'users.first_name',
        //       'users.last_name',
        //    )->where('participants.participantable_id', '=', $id)
        //    ->where('participants.participantable_type', '=', 'App\Models\Meeting')
        // ->get();

        // $meeting->status = MeetingStatusEnum::Started;
        // $meeting->save();

        // foreach ($participants as $recipient){
        //     dispatch(new SendMeetingStartedEmailsJob($meeting, $recipient));
        // }
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\SendMeetingPack;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Agenda;
use App\Models\Schedule;
use App\Models\Participant;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use App\Jobs\SendMeetingPackJob;

use Dompdf\Dompdf;
use PhpOffice\PhpWord\Writer\PDF as WriterPDF;

class PDFController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pdf.mergePDF');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:pdf'
        ]);

         if($request->hasFile('filenames')){
            $pdf = PDFMerger::init();

            foreach ($request->file('filenames') as $key => $value) {

                $pdf->addPDF($value->getPathName(), 'all');
            }

            $fileName = time().'.pdf';
            $pdf->merge();
            $pdf->save(public_path($fileName));

            // $path = Storage::path($fileName);

            // dd ($path);

        }

        return response()->download(public_path($fileName));
    }

    public function mergeMeetingDoc()
    {
        $pdf = PDFMerger::init();

        // foreach($agenda documents)

        // foreach ($request->file('filenames') as $key => $value) {

        //     $pdf->addPDF($value->getPathName(), 'all');
        // }

        $fileName = time().'.pdf';
        $pdf->merge();
        $pdf->save(public_path($fileName));

        return response()->download(public_path($fileName));
    }

     public function generateMeetingPack(string $id)
    {


       $meeting = Meeting::find($id);

       $schedules = Schedule::where('meeting_id', $meeting->id )->get();

       $participants = Participant::where('participantable_id', '=', $id)
                    ->where('participantable_type', '=', 'App\Models\Meeting')
                    ->where('deleted_at', NULL)->get();


    //   $participants = DB::table('participants')
    //         ->join('users', 'users.id', '=', 'participants.participant_id')
    //         ->select(
    //                 'participants.*',
    //                 'users.email',
    //                 'users.title',
    //                 'users.first_name',
    //                 'users.last_name',
    //             )->where('participants.participantable_id', '=', $id)
    //             ->where('participants.participantable_type', '=', 'App\Models\Meeting')
    //             ->where('participants.deleted_at', NULL)
    //         ->get();


        // dd( $participants);

    //    $participants = DB::table('participants')
    //    ->join('meetings', 'meetings.id', '=', 'participants.participantable_id')
    //    ->join('users', 'users.id', '=', 'participants.participant_id')
    //    ->join('meeting_roles', 'meeting_roles.id', '=', 'participants.meeting_role_id')
    //    ->join('groups', 'groups.id', '=', 'participants.group_id')
    //    ->select(
    //          'participants.id',
    //          'participants.meeting_role_id',
    //          'participants.group_id',
    //          'participants.status',
    //          'participants.comment',
    //          'participants.title as designation',
    //          'groups.name as group_name',
    //          'meeting_roles.name as meeting_role_name',
    //           'users.first_name',
    //           'users.middle_name',
    //           'users.last_name',
    //           'users.title as title',
    //       )->where('meetings.id', '=', $id)
    //       ->where('participants.participantable_type', '=', 'App\Models\Meeting')
    //       ->where('participants.deleted_at', NULL)
    //    ->get();


       $agendas = Agenda::where('agendable_id', $meeting['id'])
         ->where('agendable_type','App\Models\Meeting')
         ->where('deleted_at', NULL)
         ->get();



        //   dd($agendas);

        $documents = DB::table('documents')
        ->join('documentables', 'documentables.document_id', '=', 'documents.id')
        ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
        ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
        ->select(
        'documents.*',
        'agendas.id as agenda_id',
        'meetings.id as meeting_id'
        )->where('meetings.id', '=', $id)
        ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
        ->where('documents.deleted_at', NULL)
        ->get();



    $data = [
        'title' => $meeting->title,
        'schedules' => $schedules,
        'agendas' => $agendas,
        'documents' => $documents,
        'venue' => $meeting->venue,
        'participants' => $participants,

    ];

    // foreach($agendas as $index => $agenda){


    //     // Write to the pdf agenda number(index + 1) agenda title - minutes and presenter

    //     // Then join document if any
    //     foreach($documents as $key => $document){
    //         // join document with meeting info
    //     }
    //  }


    $pdf = Pdf::loadView('pdf.meeting_pack', $data);

    $fileName = time().'.pdf';

    $pdf->save(public_path($fileName));

    // return response()->download(public_path($fileName));

    Storage::put('public/pdf/' . $meeting->id . '/meeting_info.pdf', $pdf->output());
    // ->as('meeting_pack.pdf')
    // ->withMime('application/pdf');

    $data = [
        'body' => "Please find the attached meeting pack",
        'attachment' => public_path($fileName),
    ];

    // Mail::to('yahaya.frezier@datahousetza.com')->send(new SendMeetingPack($meeting, $data));

    // dd('Mail send successfully.');

    // dd($participants);


    foreach ($participants as $recipient){
        // Mail::to($recipient)->send(new MeetingStarted($meeting));

        dispatch(new SendMeetingPackJob($meeting, $recipient->user->email, $data));
    }


    return response()->download(public_path($fileName));





    // return $pdf->download('pdf/meeting_pack.pdf');

    // $path = public_path('pdf');
    // $fileName =  $meeting['title'] . '.' . 'pdf' ;
    // $pdf->saveAs($path . '\\' . $fileName);
    // return $pdf->download($fileName);

    // return $pdf->download('pdfs.meeting_pack.pdf');












                // dd($documents);



    //    $attendees = Participant::where('participantable_id', $meeting['id'])
    //                        ->where('participantable_type','App\Models\Meeting')->get();

    //                     //    dd($attendees);

    //     $absentees = [ 'name' => 'Yahaya Frezier'];


    // $html = '<h1 class="flex items-center">  ' . $meeting->title.'
    //          <br>'.$schedule->meeting_date.' from ' .$schedule->meeting_start_time.' to ' .$schedule->meeting_end_time. '
    //          <br>'.$meeting->venue.'</h1>
    //          <h2>Attendees</h2>

    //          ';

    // Pdf::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');






        // $data = [
        //     'title' => $meeting->title,
        //     'venue' => $meeting->venue,
        //     'date' => date('m/d/Y'),
        //     'agendas' => $agendas
        // ];

        // $pdf = PDF::loadView('pdfs/minutes', $data);

        // return $pdf->download('itsolutionstuff.pdf');
    }



}


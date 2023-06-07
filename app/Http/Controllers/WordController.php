<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Meeting;
use App\Models\Agenda;
use App\Models\Schedule;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Jobs\SendDraftMinutesJob;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function generateDraftMinutesWord($id)
    {

        $meeting = Meeting::find($id);

        $login_user_id =  Auth::user()->id;



        $created_by =  Auth::user()->last_name. ' ' .Auth::user()->last_name;

        $account = User::find($login_user_id)->account;

        $schedule = Schedule::where('meeting_id', $meeting->id )->first();

        $agendas = Agenda::where('agendable_id', $meeting['id'])
        ->where('agendable_type','App\Models\Meeting')->get();

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


        $participants = Participant::where('participantable_id', '=', $id)
        ->where('participantable_type', '=', 'App\Models\Meeting')
        ->where('deleted_at', NULL)->get();

        $phpWord = new PhpWord();
        $phpWord->getSettings()->setTrackRevisions(true);

        // $templateProcessor = new TemplateProcessor('meeting_tamplate.docx');



        // Set document properties

        $properties = $phpWord->getDocInfo();
        $properties->setCreator($created_by);
        $properties->setCompany($account->name);
        $properties->setTitle($meeting->title);
        $properties->setDescription($meeting->description);
        $properties->setCategory('My category');
        $properties->setLastModifiedBy($created_by);
        $properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));
        $properties->setModified(mktime(0, 0, 0, 3, 14, 2014));
        $properties->setSubject('Minutes');
        $properties->setKeywords('minutes, key, word');

        // End of document properties


        $section = $phpWord->addSection();

        // add header

        $header = $section->addHeader();
        $header->addText('Company name');

        // end header



        // add footer
        $footer = $section->addFooter();
        $footer->addText('Company address');

        // end footer

        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle($fontStyleName,
            array('name' => 'Tahoma', 'size' => 14, 'color' => '1B2232', 'bold' => true)
        );

        $phpWord->addTitleStyle(1, array('name'=>'HelveticaNeueLT Std Med', 'size'=>16,'align' => 'center' ,'color' => '1B2232', 'bold' => true)); //h1

        $title = ucwords(strtolower($meeting->title));
        $date_and_time = $schedule->meeting_date.' from ' .$schedule->meeting_start_time.' to ' .$schedule->meeting_end_time;
        $venue = ucwords(strtolower($meeting->venue));

        // $templateProcessor->setValue('title', $title);
        // $templateProcessor->setValue('date_and_time', $date_and_time);
        // $templateProcessor->setValue('venue', $venue);


        $section->addTitle($title);
        $section->addTitle($date_and_time);
        $section->addTitle($venue);

        // $text = $section->addText($meeting->title, $fontStyleName);
        // $text = $section->addText(($schedule->meeting_date.' from ' .$schedule->meeting_start_time.' to ' .$schedule->meeting_end_time),  $fontStyleName);
        // $text = $section->addText($meeting->venue,  $fontStyleName);

        $section->addTextBreak();


        $phpWord->addNumberingStyle(
            'multilevel-participant',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'upperLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        // $text = $section->addText('Attendees',  $fontStyleName);
        $section->addTitle('Attendees');

        foreach ($participants as $participant){

            // dd($participant);
            $section->addListItem($participant->user->first_name. ' '.$participant->user->last_name.' - '. $participant->meeting_role->name, 0, null, 'multilevel-participant');
            // $text = $section->addText($agenda['title']. ' - '. $agenda['presenter_id']);
        }

        $section->addTextBreak();


        // $text = $section->addText('Absentees',  $fontStyleName);
        $section->addTitle('Absentees');

        $section->addTextBreak();


        $section->addTitle('Agenda');


        $phpWord->addNumberingStyle(
            'multilevel-agenda',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'lowerLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );





    //     <ol>
    //     @foreach ($agendas as $key => $agenda)

    //     <li>{{ $agenda->title }} will take {{ $agenda->minutes}} minutes, presented by  </li>

    //        <ol>
    //             @foreach ($documents as $key => $document)

    //             @if($document->agenda_id == $agenda->id)

    //                 <li><a href="http://localhost:8000{{$document->fullpath}}">{{ $document->name }}</a></li>

    //             @endif

    //             @endforeach

    //         </ol>

    //     @endforeach
    // </ol>




        // $text = $section->addText('Agenda',  $fontStyleName);

        foreach ($agendas as $agenda){
            $section->addListItem($agenda['title']. ' - '. $agenda['presenter_id'], 0, null, 'multilevel-agenda');

            foreach($documents as $document){
                if($document->agenda_id == $agenda->id){
                    $listItemRun = $section->addListItemRun(0, null, null);

                    $listItemRun->addLink("http://localhost:8000" .$document->fullpath, $document->name, null, null);


                    // $section->addLink($linkSrc, [$linkName], [$fontStyle], [$paragraphStyle]);

                        // $section->addLink("http://localhost:8000" .$document->fullpath, $document->name, null, null);

                    }

            }


        }

        $fileName = time().'.docx';


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);






        $filePath = public_path($fileName);

        $path = Storage::path($fileName);

        $url = Storage::url($fileName);


        $data = [
            'body' => "Please find the attached draft minutes",
            'attachment' => public_path($fileName),
        ];

        foreach ($participants as $recipient){
            // Mail::to($recipient)->send(new MeetingStarted($meeting));

            dispatch(new SendDraftMinutesJob($meeting, $recipient->user->email, $data));
        }


        // if (file_exists())

        // dd($url  );
        //  dd($path  );

        // return redirect($url);





        // dd( $filePath );

        // return Storage::download('myfile.pdf');

        return Response::download('Meeting_draft_minutes.docx');

        return Storage::download("public/storage/Meeting_draft_minutes.docx");

        // $file = 'HelloWorld.docx';

        // header("Content-Description: File Transfer");
        // header('Content-Disposition: attachment; filename="' . $file . '"');
        // header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        // header('Content-Transfer-Encoding: binary');
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Expires: 0');
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // $xmlWriter->save("php://output");



        //Download automatically
        // $objWriter->save("php://output");

        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // $xmlWriter->save("php://output");






            // // $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
            // // $section->addImage("./images/prashant.jpg");

            // //save as a word document



            // //save as odf file

            // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
            // $objWriter->save('MeetingInfo.odt');

            // //save as html file

            // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            // $objWriter->save('MeetingInfo.html');

    }
}

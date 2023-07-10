<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Document;
use App\Models\Agenda;
use App\Models\Meeting;
use App\Models\Contributor;
use App\Models\Presenter;
use App\Models\Resolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Controllers\ContributorController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Meeting $meeting)
    {

        $agendas = Meeting::find($meeting->id)->agendas;
        // $agendas = Agenda::all(); //particular agenda agenda
        return Inertia::render('Agendas/Index',compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Agendas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $agenda = Agenda::find(1);

        // $document= new Document;
        // $document->name = "Laravel";


        // $agenda->documents->save($document);

        // dd($request->input('photo'));

        $created_by =  Auth::user()->id;
        $account = User::find($created_by)->account;

        $request['created_by'] = $created_by;

        $request['account_id'] = $account->id;

        if ($request['agendable_type'] == 'Meeting'){

            $meeting = Meeting::find($request->input('meeting_id'));

            $agenda = new Agenda;

            $agenda->presenter_id = $request->input('presenter_id');
            $agenda->created_by = $created_by;
            $agenda->account_id = $account->id;
            $agenda->title = $request->input('title');
            $agenda->contributor_id = $request->input('contributor_id')? $request->input('contributor_id'): $created_by;
            $agenda->minutes = $request->input('minutes');
            $agenda->purpose_id = $request->input('purpose_id');
            $agenda->external_url = $request->input('external_url');
            $agenda->recurring = $request->input('recurring');

            $meeting->agendas()->save($agenda);






            $contributor_exist = Contributor::where('contributable_id', $request->input('meeting_id'))
                                ->where('contributor_id', $request->input('contributor_id'))
                                ->where('contributable_type', 'App\Models\Meeting')
                                ->first();

            if (is_null($contributor_exist)) {

                    $contributor = new Contributor;

                    $contributor->contributor_id = $request->input('contributor_id');
                    $contributor->created_by = $created_by;
                    $contributor->account_id = $account->id;
                    // $contributor->agenda_id = $agenda->id;
                    // $contributor->title = $request->input('title');

                    $meeting->contributors()->save($contributor);
            }


            $presenter_exist = Presenter::where('meeting_id', $meeting->id)
                    ->where('agenda_id', $agenda->id)
                    ->first();

                    if (is_null($presenter_exist)) {

                    $presenter = new Presenter;

                    $presenter->presenter_id = $request->input('presenter_id');
                    $presenter->created_by = $created_by;
                    $presenter->account_id = $account->id;
                    $presenter->agenda_id = $agenda->id;
                    $presenter->meeting_id = $meeting->id;

                    $presenter->save();


}
        }


        if ($request['agendable_type'] == 'Resolution'){



            $resolution = Resolution::find($request->input('resolution_id'));

            $agenda = new Agenda;

            $agenda->presenter_id = $request->input('presenter_id');
            $agenda->created_by = $created_by;
            $agenda->account_id = $account->id;
            $agenda->title = $request->input('title');
            $agenda->contributor_id = $request->input('contributor_id')? $request->input('contributor_id'): $created_by;
            $agenda->minutes = $request->input('minutes');
            $agenda->purpose_id = $request->input('purpose_id');
            $agenda->external_url = $request->input('external_url');
            $agenda->recurring = $request->input('recurring');

            $resolution->agendas()->save($agenda);
        }









        // $result = (new ContributorController)->store($request, $agenda->id);

        // dd( $result);

        // $result1 = (new PresenterController)->store($request, $agenda->id);




        $files = $request->allFiles();



        $requestKey = array_key_first($files);



        if (!empty($files)) {


            for( $i = 0; $i < count($files); $i++ ){

                for ( $k= 0; $k < count($files[$requestKey]); $k++){

                       $file = $request->file($requestKey)[$k];

                       $filename = $file->getClientOriginalName();

                       $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

                    //    if(empty($request->input('name'))) {
                    //        $request['name'] = $filenameWithoutExtension;
                    //    }

                       $document_folder = now()->timestamp.'-'.Str::random(20);

                       $path = 'public/documents/'. $document_folder;


                       $document = new Document();

                       $document->name = $filenameWithoutExtension;
                       $document->filename = $filename;
                       $document->description = '';
                       $document->uuid = Str::uuid();
                       $document->path  = 'public/documents/'. $document_folder;
                       $document->extension = $file->getClientOriginalExtension();
                       $document->mime_type = $file->getClientMimeType();
                       $document->webpath = '/storage/documents/'. $document_folder;
                       $document->fullpath = '/storage/documents/'. $document_folder . '/'. $filename;
                       $document->size = $file->getSize();

                       $file->storeAs(
                            $path,
                            $filename
                        );

                        $contents = Storage::get($path.'/'.$filename);


                        $document->signature =  md5($contents);
                        $document->created_by = $created_by;
                        $document->account_id = $account->id;



                        $agenda->documents()->save($document);

                  }

            }

        }


        // return redirect()->route('meetings.show',compact('meeting'))
        //                 ->with('success','Agenda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        return Inertia::render('Agendas/Show',compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $agenda = Agenda::findOrFail($id);
       return Inertia::render('Agendas/Edit',compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAgendaRequest $request, string $id)
    {
        $agenda = Agenda::find($id);

        $agenda->name = $request->input('name');
        $agenda->presenter_id = $request->input('presenter_id');
        $agenda->minutes = $request->input('minutes');
        $agenda->purpose_id = $request->input('purpose_id');
        $agenda->external_url = $request->input('external_url');
        $agenda->recurring = $request->input('recurring');

        $agenda->save();

        // return redirect()->route('agendas.index')
        //                 ->with('success','Agenda updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Agenda::where('id', $id)->delete();
        // return redirect()->route('agendas.index')
        //                 ->with('success','Agenda deleted successfully');

        DB::beginTransaction();


           $agenda = Agenda::where('id', $id)->delete();

           $contributor = Contributor::where('agenda_id', $id)->delete();

           $presenter = Presenter::where('agenda_id', $id)->delete();




        if (!$agenda and !$presenter and !$contributor )
        {
            DB::rollBack();
        }else{
            DB::commit();

        }
    }
}

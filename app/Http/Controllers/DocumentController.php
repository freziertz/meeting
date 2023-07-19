<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDocumentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Process;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $url = Storage::url('file1.jpg');
        $documents = Document::all();
        return Inertia::render('Documents/Index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Documents/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //  $request['user_id'] =  Auth::user()->id;

         $request['created_by'] =  Auth::user()->id;

         $account = User::find($request['created_by'])->account;

         $request['account_id'] = $account->id;


        $files = $request->allFiles();

        // dd($files);

        $requestKey = array_key_first($files);

        if (!empty($files)) {


            for( $i = 0; $i < count($files); $i++ ){

                for ( $k= 0; $k < count($files[$requestKey]); $k++){

                       $file = $request->file($requestKey)[$k];

                       $filename = $file->getClientOriginalName();

                       $request['filename'] =  $filename;



                       // $request->request->add(['filename' => $filename]);


                      $request['size']  = $file->getSize();


                       // $request->request->add(['size' => $filesize]);


                      $request['uuid']  = Str::uuid();


                       // $request->request->add(['uuid' => $uuid ]);

                       $request['mime_type'] = $file->getClientMimeType();

                       // $request->request->add(['uuid' => $uuid ]);


                       $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

                       // $hash_name = $file->hashName();

                          if(empty($request->input('name'))) {
                             $request['name'] = $filenameWithoutExtension;
                                // $request->request->add(['name' => $filenameWithoutExtension ]);
                          }




                       $request['extension'] = $file->getClientOriginalExtension();

                       // $request->request->add(['filename' => $extension ]);



                       // $extensionMime = $file->extension();


                      $document_folder = now()->timestamp.'-'.Str::random(20);



                       $path = 'public/documents/'. $document_folder;

                       $request['path'] = $path;


                       $request['webpath'] = '/storage/documents/'. $document_folder;


                       $request['fullpath'] = '/storage/documents/'. $document_folder . '/'. $filename;

                       // dd($path);


                      $file->storeAs(
                            $path,
                            $filename

                        );


                      $contents = Storage::get($path.'/'.$filename);

                      $request['signature'] = md5($contents);

                        $document = Document::create($request->all());

                        $result = Process::run('chmod -R 775 storage');
                  }

            }

        }


        // Document::create($request->all());

        return redirect()->route('documents.index')
                        ->with('success','Document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::findOrFail($id);
        return Inertia::render('Documents/Show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $document = Document::findOrFail($id);
       return Inertia::render('Documents/Edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document = Document::find($id);

        $document->title = $request->input('title');
        $document->document_type_id = $request->input('document_type_id');
        $document->venue = $request->input('venue');
        $document->google_map_url = $request->input('google_map_url');
        $document->timezone_id = $request->input('timezone_id');
        $document->description = $request->input('description');
        $document->participants_notes = $request->input('participants_notes');
        $document->organizer_notes = $request->input('organizer_notes');
        $document->status = $request->input('status');

        $document->save();

        return redirect()->route('documents.index')
                        ->with('success','Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);


        DB::beginTransaction();

        $document = Document::find($id);

        if($document){

           $remove_data = Document::where('id', $id)->delete();

           $remove_file = Storage::delete($document->fullpath);
        }

        if (!$remove_data and !$remove_file )
        {
            DB::rollBack();
        }else{
            DB::commit();
        }
    }
}

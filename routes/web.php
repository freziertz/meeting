<?php

use App\Events\MessageSent;
use App\Events\PusherPublicEvent;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\ActionController;

use App\Http\Controllers\ActionStatusController;

use App\Http\Controllers\AgendaOptionController;

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MeetingTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReviewRoomController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MeetingRoleController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LiveController;

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\MinuteController;
use App\Models\ReviewRoom;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/event', function () {
//     // $array = ['name' => 'Ekpono Ambrose']; //data we want to pass

//     event(new PusherPublicEvent('test'));

//     // event(new MessageSent('[]','test'));


//     return 'done';
// });

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Broadcast test


    Route::get('/event', function () {
        // $array = ['name' => 'Ekpono Ambrose']; //data we want to pass

        event(new PusherPublicEvent('test'));

        $message = new App\Models\Message(['test']);

        event(new MessageSent(auth()->user(), $message));


        return 'done';
    });


    Route::put('/meeting-status/{id}', [MeetingController::class, 'status'])->name('meeting.status');

    Route::put('/meeting-publish/{id}', [MeetingController::class, 'publish'])->name('meeting-publish');

    Route::put('/meeting-start/{id}', [MeetingController::class, 'start'])->name('meeting-start');

    Route::put('/meeting-end/{id}', [MeetingController::class, 'close'])->name('meeting-end');

    Route::put('/meeting-reset/{id}', [MeetingController::class, 'reset'])->name('meeting-reset');

    Route::get('/next-meeting/{id}', [MeetingController::class, 'next'])->name('meeting-next');

    Route::get('/live-meeting/{meeting_id}/agenda/{agenda_id}/document/{document_id}', [LiveController::class, 'show'])->name('live-meeting');

    Route::put('/resolution-status/{id}', [ResolutionController::class, 'status'])->name('resolution.status');


    Route::get('/chat', [ChatsController::class, 'index'])->name('chat-index');
    Route::get('/messages', [ChatsController::class, 'fetchMessages'])->name('fetch-messages');
    Route::post('/messages', [ChatsController::class, 'sendMessage'])->name('send-message');


    Route::get('/review-agendas/{id}', [ReviewRoomController::class, 'agendas'])->name('review-agendas');







    Route::get('/next-resolution/{id}', [ResolutionController::class, 'next'])->name('next-resolution');



    //Word

    Route::get('/generate-draft-minutes/{id}', [WordController::class, 'generateDraftMinutesWord'])->name('generate-draft-minutes');

    // PDF
    Route::get('/generate-meeting-pack/{id}', [PDFController::class, 'generateMeetingPack'])->name('generate-meeting-pack');

    Route::get('merge-pdf', [PDFController::class, 'index']);
    Route::post('merge-pdf', [PDFController::class, 'store'])->name('merge.pdf.post');



    Route::get('/notify-contributors/{id}', [ContributorController::class, 'notify_contributors'])->name('notify-contributors');




    Route::resources([
        'accounts' => AccountController::class,
        'actions' => ActionController::class,
        'action-statuses' => ActionStatusController::class,
        'agenda-options' => AgendaOptionController::class,
        'announcements' => AnnouncementController::class,
        'contributors' => ContributorController::class,
        'agendas' => AgendaController::class,
        'documents' => DocumentController::class,
        'meetings' => MeetingController::class,
        'meeting-types' => MeetingTypeController::class,
        'notifications' => NotificationController::class,
        'purposes' => PurposeController::class,
        'resolutions' => ResolutionController::class,
        'organizers' => OrganizerController::class,
        'schedules' => ScheduleController::class,
        'timezones' => TimezoneController::class,
        'users' => UserController::class,
        'votes' => VoteController::class,
        'participants' => ParticipantController::class,
        'meeting-roles' => MeetingRoleController::class,
        'groups' => GroupController::class,
        'reviews' => ReviewRoomController::class,
        'directories' => DirectoryController::class,
        'admins' => AdminController::class,
        'minutes' => MinuteController::class,
        'settings' => SettingController::class,
        'roles' => RoleController::class,
    ]);



    // Route::put('/meetings/{id}', [MeetingController::class, 'status'])->name('meetings.status');
});


Route::put('/meetings/status', [MeetingController::class, 'status'])->name('meetings.status');



// Route::controller(MeetingController::class)->group(function () {

//     Route::put('/meetings/{id}', 'status')->name('meetings.status');
//     // Route::put('/meetings/{id}', 'close')->name('meetings.close');

// });


// Route::put('/meetings/{id}', [MeetingController::class, 'publish'])->name('meetings.publish');








<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\ActionController;
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

    Route::put('/status/{id}', [MeetingController::class, 'status'])->name('meeting.status');




    Route::resources([
        'accounts' => AccountController::class,
        'actions' => ActionController::class,
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
    ]);



    // Route::put('/meetings/{id}', [MeetingController::class, 'status'])->name('meetings.status');
});


Route::put('/meetings/status', [MeetingController::class, 'status'])->name('meetings.status');



// Route::controller(MeetingController::class)->group(function () {

//     Route::put('/meetings/{id}', 'status')->name('meetings.status');
//     // Route::put('/meetings/{id}', 'close')->name('meetings.close');

// });


// Route::put('/meetings/{id}', [MeetingController::class, 'publish'])->name('meetings.publish');








<?php

use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Schedule;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route public untuk detail kegiatan
Route::get('/kegiatan/{kegiatan:id}/detail', [KegiatanController::class, 'showPublic'])->name('kegiatan.detail');

Route::middleware('guest')->group(function () {
    Route::get('login', function() {
        return view('pages.auth.auth-login', ['type_menu' => '']);
    })->name('login');

    Route::get('/forget', function(){
        return view('pages.auth.auth-forgot-password');
    })->name('forget');
});


Route::middleware(['auth'])->group(function () {

    Route::resource('home', DashboardController::class);
    Route::resource('controlPanel', ControlPanelController::class);
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::resource('dashboard', DashboardController::class)->except('update');
    Route::put('dashboard/{presence:id}', [DashboardController::class, 'update'])->name('update.presence');
    Route::resource('profile', ProfileController::class)->except('updateProfilePicture');
    Route::put('/update-profile-picture/{student:nim}', [ProfileController::class, 'updateProfilePicture'])->name('update.profile.picture');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    Route::middleware('role:admin')->resource('user', UserController::class)->except('show');
    Route::middleware('role:admin')->get('/user/{user:name}', [UserController::class, 'show'])->name('user.show');
    Route::get('schedule/list', [ScheduleController::class, 'listSchedule'])->name('schedule.list');
    Route::resource('schedule', ScheduleController::class);
    // Route::put('schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
    // Route::middleware('role:admin')->resource('student', StudentController::class);
    Route::middleware('role:admin')->resource('presence', PresenceController::class)->except('show');
    // Route::get('/create-presence', [PresenceController::class, 'create'])->name('create-presence');
    Route::middleware('role:admin')->get('/presence/{schedule:title}', [PresenceController::class, 'show'])->name('presence.show');
    
    // Routes untuk Kelola Kegiatan HME (hanya admin)
    Route::middleware('role:admin')->resource('kegiatan', KegiatanController::class);
});




// Route::get('/', function () {

//       return view('pages.app.dashboard-simpadu', ['type_menu'=> '']);

//   });

// Route::get('/login', function () {

//     return view('pages.auth.auth-login');

// })->name('login');
// Route::get('/register', function () {

//       return view('pages.auth.auth-register');

// })->name('register');
// Route::get('/forgot', function () {

//     return view('pages.auth.auth-forgot-password');

// })->name('forgot');
// Route::get('/reset', function () {

//     return view('pages.auth.auth-reset-password');

// })->name('reset');

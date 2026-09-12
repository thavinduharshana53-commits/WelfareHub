<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MemberManageController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/membersAdd', [MemberManageController::class, 'index'])
        ->name('admin.membersAdd');
    
    Route::get('/meetings', [MeetingController::class, 'index'])
        ->name('admin.meetings');

    Route::get('/feeRecords', [FeeController::class, 'index'])
        ->name('admin.feeRecords');

    Route::post('/admin/members/store', [MemberController::class, 'store'] )
        ->name('admin.members.store');
    
    Route::post('feeRecords/store', [FeeController::class, 'store'] )
        ->name('feeRecords.store');

    Route::post('meetings/store', [MeetingController::class, 'store'] )
        ->name('meetings.store');


    Route::patch('/admin/members/{id}', [MemberController::class, 'update'] )
        ->name('admin.members.update');

    Route::post('/meetings/{meeting}/sms',[MeetingController::class, 'sms'])
        ->name('meetings.sms');

    Route::resource('feeRecords', FeeController::class);

    Route::resource('meetings', MeetingController::class);
    
});

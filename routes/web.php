<?php

use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\MessagesController as OtherMessagesController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('students', StudentsController::class);
    Route::resource('messages', MessagesController::class);
    Route::get('teachers/{teacher}/send-message-to', [OtherMessagesController::class, 'messageATeacher'])->name('messages.send-message-to');
    Route::post('teachers/{teacher}/store-message-to', [OtherMessagesController::class, 'storeAMessageToTeacher'])->name('messages.storeAMessageToTeacher');
    Route::resource('teachers', TeachersController::class);
    Route::get('roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::get('roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::patch('roles/{role}/update', [RolesController::class, 'update'])->name('roles.update');

    Route::get('own-messages', [OtherMessagesController::class, 'getOwnMessages'])->name('own-messages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchoolClassController;
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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth'])->name('dashboard');

Route::group(
    ['middleware' => ['role:admin'], 'prefix' => 'admin'],
    function () {
        Route::resource('admin-school-classes', SchoolClassController::class);
        Route::resource('admin-schedules', ScheduleController::class);
    }
);

Route::group(
    ['middleware' => ['role:teacher'], 'prefix' => 'teacher'],
    function () {
        Route::resource('teacher-school-classes', SchoolClassController::class);
        Route::resource('teacher-schedules', ScheduleController::class);
    }
);

require __DIR__ . '/auth.php';

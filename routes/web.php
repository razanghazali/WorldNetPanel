<?php

use Illuminate\Support\Facades\Route;
USE \App\Http\Controllers\Admin\MissionsController;
USE \App\Http\Controllers\Admins\UserController;
USE \App\Http\Controllers\Admin\weeksController;
USE \App\Http\Controllers\Admin\DaysController;
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
    return view('auth.login');
});

Route::namespace('Admin')
    ->prefix('{lang}/admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::group([
            'prefix' => '/weeks',
            'as' => 'weeks.'
        ], function () {
            Route::get('/', 'WeeksController@index')
                ->name('index');
            Route::get('/create', [WeeksController::class, 'create'])
                ->name('create')
                ->middleware(['can:weeks.create']);
            Route::post('/', [WeeksController::class, 'store'])
                ->name('store');
            Route::get('/{week}', [WeeksController::class, 'show'])
                ->name('show');
            Route::get('/{id}/edit', [WeeksController::class, 'edit'])
                ->name('edit');
            Route::put('/{id}', [WeeksController::class, 'update'])
                ->name('update');
            Route::delete('/{id}', [WeeksController::class, 'destroy'])
                ->name('destroy');

        });
        Route::group([
            'prefix' => '/days',
            'as' => 'days.'
        ], function () {
            Route::get('/', 'DaysController@index')
                ->name('index');
            Route::get('/create', [DaysController::class, 'create'])
                ->name('create')
                ->middleware(['can:days.create']);
            Route::post('/', [DaysController::class, 'store'])
                ->name('store');
            Route::get('/{day}', [DaysController::class, 'show'])
                ->name('show');
            Route::get('/{id}/edit', [DaysController::class, 'edit'])
                ->name('edit');
            Route::put('/{id}', [DaysController::class, 'update'])
                ->name('update');
            Route::delete('/{id}', [DaysController::class, 'destroy'])
                ->name('destroy');

        });

    });


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');

        Route::get('/admins/users/getusers', [UserController::class, 'getusers'])->name('user');
        require __DIR__ . '/auth.php';
        Route::resource('/admin/missions', 'admin\MissionsController');
        Route::resource('/admin/days', 'admin\DaysController');
        Route::resource('/admin/weeks', 'admin\WeeksController');
        Route::resource('/admins/users', 'Admins\UserController');
        Route::resource('/admins/notes', 'Admins\NotesController');
        Route::resource('/admins/checked', 'Admins\CheckedController');
        Route::get('/search', [UserController::class, 'search'])->name('search');
        Route::get('/sear', [MissionsController::class, 'searchh'])->name('searchh');


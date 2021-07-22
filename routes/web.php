<?php

use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
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
    return redirect()->route('login');
})->name('home');




Route::group(['middleware' => ['auth','save_last_action_at']],function (){

    Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [\App\Http\Controllers\User\ChecklistController::class, 'show'])
        ->name('users.checklists.show');

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'],function (){
        Route::resource('pages', PageController::class);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists',ChecklistController::class);
        Route::resource('checklists.tasks',TaskController::class);
        Route::get('users',[UserController::class, 'index'])->name('users.index');
        Route::post('images',[ImageController::class, 'store'])->name('images.store');
    });
});

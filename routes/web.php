<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AspirantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GubernitorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/addPosition', [WelcomeController::class, 'addPositions'])->name('addPosition');


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');


Route::get('/become-a-candidate',[WelcomeController::class, 'index'])->name('aspire');
Route::post('/aspirant', [WelcomeController::class, 'aspirant'])->name('aspirant');
Route::get('/gubernetorial-candidates', [WelcomeController::class, 'allGuber'])->name('guber');
Route::get('/presidential-candidates', [WelcomeController::class, 'allPresidents'])->name('presidential');
Route::get('/all_bio/{id}', [WelcomeController::class, 'bio'])->name('bio');
Route::get('/filter-aspirants-by-state', [WelcomeController::class, 'filterState'])->name('aspirants.state');



Route::middleware(['auth', 'verified'])->prefix('dashboard') ->group(function () {
    Route::get('/', [HomeController::class, 'go'])->name('home');

    Route::get('/user', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::get('/edit_profile/{profile}',[ProfileController::class, 'editProfile'])->name('edit_profile');
    Route::post('/update_profile',[ProfileController::class,'updateProfile'])->name('update_profile');

    Route::get('/voting-categories',[VoteController::class, 'index'])->name('vote.categories');
    Route::get('/confirm-vote/{name}/{id}',[VoteController::class, 'confirm'])->name('vote.confirm');
    Route::get('/{type}/aspirants',[VoteController::class, 'contestants'])->name('dashboard.contestants');
    Route::get('/filter-aspirants-by-state', [VoteController::class, 'filterState'])->name('dashboard.contestants.state');
    Route::get('/vote',[VoteController::class, 'vote'])->name('vote');

    // Route::get('/results/{state_id}',[VoteController::class, 'results'])->name('results');
});


Route::prefix('admin')->middleware(['auth','verified', 'admin'])->group(function () {
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/aspirants/{status}',[AspirantController::class, 'aspirants'])->name('admin.aspirants');
    Route::put('/aspirants/action',[AspirantController::class, 'action'])->name('admin.aspirant.action');
    Route::get('/results/{state_id}',[AspirantController::class, 'results'])->name('admin.results');
    Route::get('/edit-aspirant/{aspirant}',[AspirantController::class, 'edit'])->name('admin.aspirant.edit');
    Route::post('/update-aspirant/{aspirant}',[AspirantController::class, 'update'])->name('admin.aspirant.update');

    Route::get('/voters',[UserController::class, 'voters'])->name('admin.voters');

});


require __DIR__.'/auth.php';

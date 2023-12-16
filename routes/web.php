<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KafeelGiftController;
use App\Http\Controllers\MainSectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MagazinesController;



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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/change-language/{locale}',     [LocaleController::class, 'switch'])->name('change.language');



Route::group(['middleware' => 'web'], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/social',[AboutController::class,'socialmedia'])->name('socialmedia');

Route::get('/museumDuties', [StructureController::class,'index'])->name('museumDuties');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'store'])->name('contactSend');

Route::get('/about',[AboutController::class,'index'])->name('about');

Route::group(['prefix' => '/nafessPage'], function ()  {

Route::get('/',[MainSectionsController::class,'index'])->name('mainSections');

Route::get('/{id}',[MainSectionsController::class,'show'])->name('allSections');

});

//Route::get('allSections/{id}', [SectionsController::class,'allSectionMainS'])->name('allSections');

Route::get('/reviews', [NewsController::class,'indexReviews'])->name('reviews');


Route::group(['prefix' => '/kafeelGift'], function () {

    Route::get('/', [KafeelGiftController::class,'index'])->name('kafeelGift');
    Route::get('/{id}', [KafeelGiftController::class,'show'])->name('giftMuseumId');


});

Route::group(['prefix' => '/news'], function () {

    Route::get('/', [NewsController::class,'index'])->name('news');

    Route::get('/{id}', [NewsController::class,'show'])->name('newsId');

});

Route::group(['prefix' => '/sections'], function ()  {

    Route::get('/{id}',[SectionsController::class,'show'])->name('detailSection');

});

Route::group(['prefix' => '/subjects'], function () {

    Route::get('/{id}', [SubjectsController::class,'indexSections'])->name('nafessDetails');

});



Route::group(['prefix' => '/magazines'], function () {

    Route::get('/', [MagazinesController::class,'index'])->name('magazines');

});

});


Auth::routes();


Auth::routes();


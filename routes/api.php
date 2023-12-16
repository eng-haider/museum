<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\InputsController;
use App\Http\Controllers\Api\KafeelGiftController;
use App\Http\Controllers\Api\MainSectionsController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CorridorsController;

use App\Http\Controllers\Api\NewsController;

use App\Http\Controllers\Api\SectionsController;

use App\Http\Controllers\Api\SubjectsController;

use App\Http\Controllers\Api\StructureController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('imageResize',[NewsController::class,'imgResize']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',  [RegisterController::class,'register']);
Route::post('users/login', [RegisterController::class,'login']);



//checkRole
    Route::get('about', [AboutController::class, 'index']);
    Route::post('about', [AboutController::class, 'store']);
    Route::put('aboutUpdate/{id}', [AboutController::class, 'update']);
    Route::delete('about/{id}', [AboutController::class, 'destroy']);
    Route::post('about/upload/{id}', [AboutController::class, 'uploadImage']);

    Route::post('uploadImageNews', [NewsController::class, 'uploadImagesAttached']);
    Route::get('getImages/{id}', [NewsController::class, 'getImages']);
    Route::delete('/destroyImage/{id}', [NewsController::class, 'destroyImage']);


    Route::group(['prefix' => '/news'], function () {

        Route::get('/', [NewsController::class, 'index']);

        Route::post('/', [NewsController::class, 'store']);
        Route::post('/uploadImage/{id}', [NewsController::class, 'uploadImage']);
        Route::put('/update/{id}', [NewsController::class, 'update']);
        Route::delete('/{id}', [NewsController::class, 'destroy']);

    });

    Route::group(['prefix' => '/kafeelGift'], function () {

        Route::get('/', [KafeelGiftController::class, 'index']);

        Route::post('/', [KafeelGiftController::class, 'store']);
        Route::post('/uploadImage/{id}', [KafeelGiftController::class, 'uploadImage']);
        Route::put('/update/{id}', [KafeelGiftController::class, 'update']);
        Route::delete('/{id}', [KafeelGiftController::class, 'destroy']);

    });

    Route::get('/callus', [ContactUsController::class, 'index']);
    Route::get('/callus/show/{id}', [ContactUsController::class, 'show']);

    Route::group(['prefix' => '/corridors'], function () {


        Route::get('/', [CorridorsController::class, 'importDataCorridors']);

        Route::get('/', [CorridorsController::class, 'index']);

        Route::post('/', [CorridorsController::class, 'store']);

        Route::post('/uploadImage/{id}', [CorridorsController::class, 'uploadImage']);

        Route::put('update/{id}', [CorridorsController::class, 'update']);

        Route::delete('/{id}', [CorridorsController::class, 'destroy']);

        Route::delete('/destroyImage/{id}', [CorridorsController::class, 'destroyImage']);


    });

    Route::get('mainSectionsSelected', [MainSectionsController::class, 'indexAdmin']);

    Route::get('sectionsSelected', [SectionsController::class, 'indexAdmin']);

    Route::group(['prefix' => '/sections'], function () {

        Route::get('/', [SectionsController::class, 'index']);

//    Route::get('/', [SectionsController::class,'importDataSections']);

        Route::post('/', [SectionsController::class, 'store']);

        Route::post('/uploadImage/{id}', [SectionsController::class, 'uploadImage']);

        Route::put('/{id}', [SectionsController::class, 'update']);

        Route::delete('/{id}', [SectionsController::class, 'destroy']);
        Route::delete('/destroyImage/{id}', [SectionsController::class, 'destroyImage']);


    });

    Route::group(['prefix' => '/mainSections'], function () {

        Route::get('/', [MainSectionsController::class, 'index']);

        Route::post('/', [MainSectionsController::class, 'store']);
        Route::post('/uploadImage/{id}', [MainSectionsController::class, 'uploadImage']);

        Route::put('/update/{id}', [MainSectionsController::class, 'update']);

        Route::delete('/{id}', [MainSectionsController::class, 'destroy']);
        Route::delete('/destroyImage/{id}', [MainSectionsController::class, 'destroyImage']);


    });


    Route::group(['prefix' => '/structure'], function () {


        Route::get('/', [StructureController::class, 'index']);

        Route::post('/', [StructureController::class, 'store']);
        Route::post('/uploadImage/{id}', [StructureController::class, 'uploadImage']);

        Route::put('/{id}', [StructureController::class, 'update']);

        Route::delete('/{id}', [StructureController::class, 'destroy']);
        Route::delete('/destroyImage/{id}', [StructureController::class, 'destroyImage']);

    });

    Route::group(['prefix' => '/subjects'], function () {


        Route::get('/', [SubjectsController::class, 'index']);

        Route::get('/{id}/section', [SubjectsController::class, 'section']);

        Route::post('/', [SubjectsController::class, 'store']);

        Route::post('/uploadImage/{id}', [SubjectsController::class, 'uploadImage']);


        Route::put('/update/{id}', [SubjectsController::class, 'update']);

        Route::delete('/{id}', [SubjectsController::class, 'destroy']);
        Route::delete('/destroyImage/{id}', [SubjectsController::class, 'destroyImage']);

    });

    Route::group(['prefix' => '/inputsSubjects'], function () {


        Route::get('/', [InputsController::class, 'index']);

        Route::get('/{id}/section', [SubjectsController::class, 'section']);

        Route::post('/', [InputsController::class, 'store']);

        Route::post('/uploadImage/{id}', [InputsController::class, 'uploadImage']);


        Route::put('/update/{id}', [InputsController::class, 'update']);

        Route::delete('/{id}', [InputsController::class, 'destroy']);
        Route::delete('/destroyImage/{id}', [InputsController::class, 'destroyImage']);

    });


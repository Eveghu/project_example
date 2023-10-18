<?php
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trainer/create', [TrainerController::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/trainers', TrainerController::class);

Route::get('delete/{id}',[TrainerController::class, 'destroy']);

 Route::controller(ImageController::class)->group(function(){
     Route::get('image-upload', 'index');
     Route::post('image-upload', 'imageUpload')->name('image.store');
 });

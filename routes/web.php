<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bi-mat', function () {
    return 'bí mật @@';
})->middleware(['auth','role:admin']);

Route::resource('/article', ArticleController::class)->names('article');
Route::resource('/category', CategoryController::class)->names('category');

Route::get('/move',[ArticleController::class,'move'])->name('move')->middleware('auth');

// Route::get('/google-login', [SocialController::class,'googleLogin'])->name('google-login');
// Route::get('/google_callbacks',[SocialController::class,'processGoogleLogin']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\UserArticleController;
use App\Http\Controllers\VideoController;
use App\Models\Article;

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

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('adminHome');
});
Route::group(['prefix'=>'user','middleware'=>['auth','role:user']],function(){
    Route::resource('article', UserArticleController::class)->names('userArticle');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
Route::get('/resource/category', [App\Http\Controllers\CategoryController::class, 'index'])
        ->name('getCategoryResource');


// Route::get('/bi-mat', function () {
//     return 'bí mật @@';
// })->middleware(['auth','role:admin']);

// Route::resource('/article', ArticleController::class)->names('article');
// Route::resource('/category', CategoryController::class)->names('category');

// Route::resource('/order', OrderController::class)->names('order')->middleware('auth');


// Route::get('/move',[ArticleController::class,'move'])->name('move')->middleware('auth');

// Route::get('/google-login', [SocialController::class,'googleLogin'])->name('google-login');
// Route::get('/google_callbacks',[SocialController::class,'processGoogleLogin']);



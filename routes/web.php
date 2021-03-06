<?php

use App\Http\Controllers\Admin\AdminUserController;
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

Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth','checkBlock','role:admin']],function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('admin.Home');
    Route::get('/users',[AdminUserController::class,'index'])->name('admin.manageUser');
    Route::get('/users/block/{user}',[AdminUserController::class,'blockUser'])->name('admin.blockUser');
    Route::get('/users/unblock/{user}',[AdminUserController::class,'unBlockUser'])->name('admin.unBlockUser');

});
Route::group(['prefix'=>'user','middleware'=>['auth','checkBlock','role:user']],function(){
    Route::resource('article', UserArticleController::class)->names('userArticle');
    Route::post('upload-thumbnail', [UserArticleController::class,'uploadImage'])->name('userUploadImg');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('homePage')->middleware(['auth','checkBlock']);
Route::get('/resource/category', [App\Http\Controllers\CategoryController::class, 'index'])
        ->name('getCategoryResource');
Route::resource('/article', HomeArticleController::class)->names('article');

// Route::get('/bi-mat', function () {
//     return 'b?? m???t @@';
// })->middleware(['auth','role:admin']);


// Route::resource('/category', CategoryController::class)->names('category');

// Route::resource('/order', OrderController::class)->names('order')->middleware('auth');


// Route::get('/move',[ArticleController::class,'move'])->name('move')->middleware('auth');

// Route::get('/google-login', [SocialController::class,'googleLogin'])->name('google-login');
// Route::get('/google_callbacks',[SocialController::class,'processGoogleLogin']);



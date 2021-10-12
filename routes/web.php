<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('web');

//load webiste blog page
Route::get('/blogpost', [WebPostController::class, 'index'])->name('blogpost.comments');
Route::get('/blogpost/show/{id}', [WebPostController::class, 'show'])->name('blogpostid.show');

//load webiste blog page

Route::group(['middleware' => 'auth'], function () {


   
    //Common URIs
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    //load dashboard
    Route::get('/dash', [HomeController::class, 'dash'])->name('dash.board');




    //Profile


    //Admin URIs
    Route::group(['middleware' => 'auth.role:ADMIN'], function () {

    
        //User
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/user/add', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });


    //Blogger and ADMIN URIs
    Route::group(['middleware' => 'auth.role:BLOGGER||ADMIN'], function () {

        //posts
        Route::get('/post', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.show');
        Route::get('/post/add', [PostController::class, 'create'])->name('post.create');
        Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::post('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');


           //posts comments
           Route::get('/postcomment', [PostCommentController::class, 'index'])->name('postcomment.index');
           Route::get('/postcomment/show/{id}', [PostCommentController::class, 'show'])->name('postcomment.show');
          
           Route::get('/postcomment/edit/{id}', [PostCommentController::class, 'edit'])->name('postcomment.edit');
           Route::post('/postcomment/update/{id}', [PostCommentController::class, 'update'])->name('postcomment.update');

           Route::get('/postcomment/delete/{id}', [PostCommentController::class, 'delete'])->name('postcomment.delete');
           Route::post('/postcomment/destroy/{id}', [PostCommentController::class, 'destroy'])->name('postcomment.destroy');
            //posts comments


           //submit post comment via  website
           Route::post('/blogpost/store/{id}', [WebPostController::class, 'store'])->name('blogpostid.store');


    });




});

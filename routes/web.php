<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Dedaunan",
        "email" => "tevimmanuel71@gmail.com",
        "image" => "charles.jpg"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all()
        ]);
});
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title'=> "Post by Category : $category->name",
        "active" => "categories",
        'posts' => $category->posts->load('category','user'),
        ]);
});

Route::get('/author/{user:username}', function(User $user){
    return view('posts', [
        'title'=> "Post by Author : $user->name",
        "active" => "posts",
        'posts' => $user->posts->load('category','user'),
        ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/dashboard',function(){
    return view('dashboard.index',[
        'title' => 'Login',
        'active' => 'login'
        ]);
})->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/settings', [DashboardPostController::class,'userKembali'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard',[DashboardPostController::class,'indexDashboard'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSlug'])->name('')->middleware('auth');
Route::get('/dashboard/biolink',[DashboardPostController::class,'biolink'])->middleware('auth');
Route::get('/dashboard',[DashboardPostController::class,'countUser'])->middleware('auth');
Route::get('/dashboard/testingpage',[DashboardPostController::class,'testPage'])->middleware('auth');
Route::get('/userlist', [DashboardPostController::class, 'getJsonData']);
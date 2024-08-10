<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LikedController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PlantCategoryController;
use App\Http\Controllers\Admin\PlantController;
use App\Http\Controllers\Admin\PlantTagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Main\MainPlantsController;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::namespace('Main')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('main.index');
    Route::get('/about', [MainController::class, 'about'])->name('main.about');
    Route::get('/blog', [MainController::class, 'blog'])->name('main.blog');
    Route::get('/post/{id}', [MainController::class, 'post'])->name('main.blog.post');
    Route::get('/contact', [MainController::class, 'contact'])->name('main.contact');

    Route::group(['prefix' => 'plants'], function () {
        Route::get('/', [MainPlantsController::class, 'index'])->name('plants.index');
        Route::get('/{id}', [MainPlantsController::class, 'detail'])->name('plant.detail');
    });

    Route::prefix('{post}/comments')->group(function (){
        Route::post('/',[MainController::class, 'comment'])->name('post.comment');
    });
    Route::prefix('{post}/likes')->group(function (){
        Route::post('/',[MainController::class, 'like'])->name('post.like');
    });
});

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'plants'], function () {
        Route::get('/', [PlantController::class, 'index'])->name('plant.index');
        Route::get('/create', [PlantController::class, 'create'])->name('plant.create');
        Route::post('/', [PlantController::class, 'store'])->name('plant.store');
        Route::get('/{plant}', [PlantController::class, 'show'])->name('plant.show');
        Route::get('/{plant}/edit', [PlantController::class, 'edit'])->name('plant.edit');
        Route::patch('/{plant}', [PlantController::class, 'update'])->name('plant.update');
        Route::delete('/{plant}', [PlantController::class, 'delete'])->name('plant.delete');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/', [PostController::class, 'store'])->name('post.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/{post}/comments', [PostController::class, 'comments'])->name('post.comments');
        Route::patch('/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('post.delete');
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/', [TagController::class, 'store'])->name('tag.store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('tag.show');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('tag.update');
        Route::delete('/{tag}', [TagController::class, 'delete'])->name('tag.delete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    });
    Route::group(['prefix' => 'liked'], function () {
        Route::get('/', [LikedController::class, 'index'])->name('like.index');
        Route::delete('/{post}', [LikedController::class, 'delete'])->name('like.delete');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
        Route::patch('/{comment}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
    });
    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', [MessageController::class, 'index'])->name('chat.index');
        Route::get('/{user}/message', [MessageController::class, 'show'])->name('chat.show');
        Route::post('/{user}/message', [MessageController::class, 'chat'])->name('chat.store');
    });
});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    return "Кэш очищен.";});
Auth::routes(['verify' => true]);


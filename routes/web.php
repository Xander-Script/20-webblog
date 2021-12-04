<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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
})->name('home.index');

foreach (['article', 'category'] as $name) {
    $plural = Str::plural($name);
    $controller = '\App\Http\Controllers\\'.ucfirst($name).'Controller';

    Route::redirect("/$name", "/$plural", Response::HTTP_PERMANENTLY_REDIRECT);
    Route::get("/$plural", [$controller, 'index'])->name("$name.index");
    Route::get("/$name/{".$name.':slug}', [$controller, 'show'])->name("$name.show");
}

Route::get('/subscribe', fn () => 'TODO')->name('subscribe'); //todo

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

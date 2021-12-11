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

if (!$admin = parse_url(config('app.admin_url'), PHP_URL_HOST)) {
    $admin = 'admin.localhost';
}

Route::domain($admin)->group(function() {
    Route::get('/', function() { echo 'hi'; });
    Route::get("/articles", function() { echo "<title>Got ya</title>"; });
});

Route::permanentRedirect('/', '/articles');

Route::resource('articles', '\App\Http\Controllers\ArticleController');

//foreach (['article', 'category'] as $name) {
//    $plural = Str::plural($name);
//    $controller = '\App\Http\Controllers\\'.ucfirst($name).'Controller';
//
//    Route::redirect("/$name", "/$plural", Response::HTTP_PERMANENTLY_REDIRECT);
//    Route::get("/$plural", [$controller, 'index'])->name("$name.index");
//    Route::get("/$name/{".$name.':slug}', [$controller, 'show'])->name("$name.show");
//}

Route::get('/todo', fn () => "TODO")->name('todo');

Route::get('/subscribe', fn () => 'TODO')->name('subscribe'); //todo

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

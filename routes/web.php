<?php

// routes/web.php

use App\Http\Controllers\NewsController; // << use Controller ของเรา
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.detail');

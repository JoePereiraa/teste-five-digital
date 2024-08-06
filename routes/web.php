<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/arquivos', [FileUploadController::class, 'index'])->middleware('verified')->name('archives');
        Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.create');
        Route::post('/upload', [FileUploadController::class, 'uploadFile'])->name('file.upload');
    }
);

Route::middleware(['auth', CheckAdmin::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/aprovar', [FileUploadController::class, 'edit'])->name('file.edit');
        Route::post('/approve/{id}', [FileUploadController::class, 'approve'])->name('file.approve');
        Route::post('/reject/{id}', [FileUploadController::class, 'reject'])->name('file.reject');
    }
);


require __DIR__.'/auth.php';

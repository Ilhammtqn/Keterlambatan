<?php

use App\Http\Controllers\LateController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::middleware('IsGuest')->group(function() {
    Route::get('/', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsLogin'])->group(function() {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home.page');
});

Route::middleware('IsLogin', 'IsAdmin')->group(function() {
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/data', [UserController::class, 'index'])->name('data');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rombel')->name('rombel.')->group(function() {
        Route::get('/', [RombelController::class, 'index'])->name('home');
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::post('/store', [RombelController::class, 'store'])->name('store');
        Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');

    });

    Route::prefix('/rayon')->name('rayon.')->group(function() {
        Route::get('/', [RayonController::class, 'index'])->name('home');
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');

    });

    Route::prefix('/late')->name('late.')->group(function() {
        Route::get('/', [LateController::class, 'index'])->name('home');
        Route::get('/rekap', [LateController::class, 'rekap'])->name('rekap');
        Route::get('/create', [LateController::class, 'create'])->name('create');
        Route::post('/store', [LateController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LateController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LateController::class, 'destroy'])->name('delete');
        Route::get('/rekap/show/{student_id}', [LateController::class, 'show'])->name('show');
        Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download');
        Route::get('/print/{id}', [LateController::class, 'print'])->name('print');
        Route::get('/search', [LateController::class, 'search'])->name('search');
        Route::get('/export-excel', [LateController::class, 'exportExcel'])->name('export-excel');
    });

    Route::prefix('/student')->name('student.')->group(function() {
        Route::get('/', [StudentController::class, 'index'])->name('home');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
    
    });
});

Route::middleware(['IsLogin', 'IsPembimbing'])->group(function() {
    Route::prefix('/pembimbing')->name('pembimbimg.')->group(function(){
        Route::prefix('/late')->name('late.')->group(function() {
            Route::get('/', [LateController::class, 'keterlambatan'])->name('index');
        });
    });
});
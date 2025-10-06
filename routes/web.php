<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\enrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});
////////////////////////////////////// Teacher Routes //////////////////////////////////////////////////////////
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('storeteachers');
    Route::put('/teachers/{Id}', [TeacherController::class, 'update'])->name('Updateteachers');
    Route::delete('/teachers/{Id}', [TeacherController::class, 'destroy'])->name('deletTeachers');
});
////////////////////////////////////// Teacher Routes //////////////////////////////////////////////////////////

////////////////////////////////////// Student Routes //////////////////////////////////////////////////////////
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/student', [studentController::class, 'index'])->name('showStudent');
    Route::post('/student', [studentController::class, 'store'])->name('StoreStudent');
    Route::put('/student/{Id}', [studentController::class, 'update'])->name('UpdateStudent');
    Route::delete('/student/{Id}', [studentController::class, 'destroy'])->name('deletStudent');
});
////////////////////////////////////// Student Routes //////////////////////////////////////////////////////////

////////////////////////////////////// enrollment Routes //////////////////////////////////////////////////////////
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/enrollment', [enrollmentController::class, 'index'])->name('showenrollment');
    Route::post('/enrollment', [enrollmentController::class, 'store'])->name('Storeenrollment');
    Route::put('/enrollment/{Id}', [enrollmentController::class, 'update'])->name('Updateenrollment');
    Route::delete('/enrollment/{Id}', [enrollmentController::class, 'destroy'])->name('deletenrollment');
});
////////////////////////////////////// enrollment Routes //////////////////////////////////////////////////////////


////////////////////////////////////// courses Routes //////////////////////////////////////////////////////////

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/course', [courseController::class, 'index'])->name('showCourse');
    Route::post('/course', [courseController::class, 'store'])->name('StoreCourse');
    Route::put('/course/{Id}', [courseController::class, 'update'])->name('UpdateCourse');
    Route::delete('/course/{Id}', [courseController::class, 'destroy'])->name('deletCourse');
});

////////////////////////////////////// courses Routes //////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::post('/roles', [ReportController::class, 'storeRole'])->name('roles.store');
Route::post('/permissions', [ReportController::class, 'storePermission'])->name('permissions.store');
Route::post('/assign-permission', [ReportController::class, 'assignPermission'])->name('permissions.assign');
Route::delete('/roles/{id}', [ReportController::class, 'destroyRole'])->name('roles.destroy');
Route::delete('/permissions/{id}', [ReportController::class, 'destroyPermission'])->name('permissions.destroy');
Route::put('/roles/{id}', [ReportController::class, 'updateRole'])->name('roles.update');
Route::put('/permissions/{id}', [ReportController::class, 'updatePermission'])->name('permissions.update');


require __DIR__.'/auth.php';

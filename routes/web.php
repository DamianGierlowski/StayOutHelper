<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestTrackerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);
// Resource route for CRUD operations
Route::resource('quests', QuestTrackerController::class);

// Or define individual routes
Route::get('/quests', [QuestTrackerController::class, 'index'])->name('quests.index');
Route::get('/quests/create', [QuestTrackerController::class, 'create'])->name('quests.create');

Route::get('/quests/{questTaken}', [QuestTrackerController::class, 'show'])->name('quests.show');

Route::post('/quests', [QuestTrackerController::class, 'store'])->name('quests.store');
Route::get('/quests/take/{quest}', [QuestTrackerController::class, 'take'])->name('quests.take');

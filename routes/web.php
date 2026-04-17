<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'home']);

Route::get('/login', [AuthController::class, 'loginPage']);
Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/notes', [NoteController::class, 'index']);

Route::post('/notes', [NoteController::class, 'store']);
Route::post('/folders', [NoteController::class, 'createFolder']);

Route::post('/notes/delete/{id}', [NoteController::class, 'deleteNote']);
Route::post('/folders/delete/{id}', [NoteController::class, 'deleteFolder']);

Route::get('/notes/edit/{id}', [NoteController::class, 'edit']);
Route::post('/notes/update/{id}', [NoteController::class, 'update']);

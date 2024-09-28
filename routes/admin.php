<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;   
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('admin.index');
});

Route::resource('users', UserController::class);
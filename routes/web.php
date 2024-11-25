<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GPSController;

Route::get('/', function () {
    return view('vendor/filament-panels.pages.auth.login');
});

Route::redirect('/', '/admin/login');

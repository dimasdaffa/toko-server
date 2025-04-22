<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('filament.admin.pages.dashboard');
});

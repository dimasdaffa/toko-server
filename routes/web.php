<?php

use App\Filament\Resources\CategoryResource\Api\CategoryApiService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('filament.admin.pages.dashboard');
});

// CategoryApiService::routes();

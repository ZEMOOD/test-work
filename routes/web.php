<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

Route::get('oauth2callback', 'ZohoController@oauth2callback');
Route::get('/', Main::class);

<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/{any}',
    'App\Http\Controllers\AppMainController@index'
)
    ->where('any', '.*');

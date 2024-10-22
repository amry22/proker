<?php

use App\Models\DataImplementation;
use App\Models\DataProker;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});


Route::get('/anu', function () {
    return DataImplementation::with(['proker'])->get();
});
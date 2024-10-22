<?php

use App\Models\DataProker;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});


Route::get('/anu', function () {
    return DataProker::with(['division'])->get();
});
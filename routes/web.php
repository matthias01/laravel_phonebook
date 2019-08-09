<?php


Route::get('/', function () {
    return view('home');
});

Auth::routes();


//allows vue-router to do its thingy
Route::get('/{name}', function () {
    return redirect('/');
})->where('name', '[A-za-z]+');

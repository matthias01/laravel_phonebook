<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//allows vue-router to do its thingy
Route::get('/phonebook/{name}', function () {
    return redirect('/');
})->where('name', '[A-za-z]+');


Route::resource('phonebook', 'PhonebookController');

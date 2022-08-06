<?php



Route::get('home', 'homeController@index')->name('home');
Route::get('rules', 'homeController@rules')->name('rules');
Route::get('ershad', 'homeController@ershad')->name('ershad');
Route::get('slook', 'homeController@slook')->name('slook');
Route::get('plans', 'homeController@plans')->name('plans');
Route::get('library', 'homeController@library')->name('library');
Route::get('image/{id}', 'homeController@image')->name('image');

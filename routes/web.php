<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/urnik/{activity}', 'ScheduleController@show')->name('schedule');
Route::get('/uvoz', 'ImportController@create')->name('import');

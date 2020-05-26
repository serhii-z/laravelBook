<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('topic/search','TopicController@search');

Route::resource('topic', 'TopicController');

Route::resource('block','BlockController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

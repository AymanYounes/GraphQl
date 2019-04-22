<?php


/******************************************  Home Routes Start  ******************************************/
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'homeIndex']);
Route::get('project', ['uses' => 'ProjectController@index', 'as' => 'projectIndex']);
Route::post('contact-us', ['uses' => 'HomeController@contactUs', 'as' => 'homeContactUs']);
/******************************************  Home Routes End  ******************************************/
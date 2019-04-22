<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('settings', 'Api\SettingsController');
Route::resource('paragraphs', 'Api\ParagraphsController');
Route::resource('education', 'Api\EducationController');
Route::resource('work-experiences', 'Api\WorkExperiencesController');
Route::resource('project', 'Api\ProjectController');
Route::resource('contact-us', 'Api\ContactUSController');
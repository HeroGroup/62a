<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'SiteController@index')->name('index');
Route::get('/career', 'SiteController@career')->name('career');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::get('/events', 'SiteController@events')->name('events');
Route::get('/event/{event}', 'SiteController@event')->name('event');
Route::get('/projects', 'SiteController@projects')->name('projects');
Route::get('/project/{project}', 'SiteController@project')->name('project');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/what-we-do', 'SiteController@whatWeDo')->name('whatWeDo');

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/', function() { return view('admin.index'); })->name('index');
        });
    });
});


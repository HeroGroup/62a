<?php

use Illuminate\Support\Facades\Route;

Route::name('site.')->group(function () {
    Route::get('/', function() { return view('site.comingSoon'); })->name('comingSoon');

    Route::get('/index', 'SiteController@index')->name('index');
    Route::get('/career', 'SiteController@career')->name('career');
    Route::get('/contact', 'SiteController@contact')->name('contact');
    Route::get('/events', 'SiteController@events')->name('events');
    Route::get('/event/{event}', 'SiteController@event')->name('event');
    Route::get('/projects', 'SiteController@projects')->name('projects');
    Route::get('/project/{project}', 'SiteController@project')->name('project');
    Route::get('/about', 'SiteController@about')->name('about');
    Route::get('/what-we-do', 'SiteController@whatWeDo')->name('whatWeDo');
    Route::post('/contactUs/store','Admin\ContactUsController@store')->name('contactUs.store');

    Route::get('/getFooter', 'SiteController@getFooter')->name('getFooter');

    Route::get('/language/{lang}', 'SiteController@changeLanguage')->name('changeLanguage');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/', function () { return redirect(route('admin.landing.index')); })->name('index');
                Route::resource('users', 'UserController');
                Route::get('users/{user}/resetPassword', 'UserController@resetPassword')->name('users.resetPassword');
                Route::get('users/{user}/profile', 'UserController@changePassword')->name('users.profile');
                Route::post('users/updatePassword', 'UserController@updatePassword')->name('users.updatePassword');

                Route::resource('categories', 'CategoryController')->except(['create', 'edit', 'show']);

                Route::resource('projects', 'ProjectController');
                Route::post('/projects/imageUpload','ProjectController@imageUpload')->name('projects.imageUpload');
                Route::post('/projects/deleteImage','ProjectController@deleteImage')->name('projects.deleteImage');
                Route::post('/projects/makeCover','ProjectController@makeCover')->name('projects.makeCover');
                Route::post('/projects/updateBottomSection', 'ProjectController@updateBottomSection')->name('projects.updateBottomSection');

                Route::resource('aboutUs', 'AboutUsController');
                Route::post('/aboutUs/imageUpload','AboutUsController@imageUpload')->name('aboutUs.imageUpload');
                Route::resource('teamMembers', 'TeamMemberController');
                Route::post('/teamMembers/memberImageUpload','TeamMemberController@memberImageUpload')->name('teamMembers.memberImageUpload');

                Route::get('/landing', 'LandingController@index')->name('landing.index');
                Route::post('/landing/uploadBannerImage', 'LandingController@uploadBannerImage')->name('landing.uploadBannerImage');
                Route::put('/landing/updateBannerDetails', 'LandingController@updateBannerDetails')->name('landing.updateBannerDetails');
                Route::delete('/landing/deleteBanner', 'LandingController@deleteBanner')->name('landing.deleteBanner');
                Route::put('/landing/updateTopSection', 'LandingController@updateTopSection')->name('landing.updateTopSection');
                Route::put('/landing/updateBottomSection', 'LandingController@updateBottomSection')->name('landing.updateBottomSection');

                Route::get('/contactUs','ContactUsController@index')->name('contactUs.index');
                Route::get('/contactUs/show/{id}','ContactUsController@show')->name('contactUs.show');
                Route::post('/contactUs/reply','ContactUsController@reply')->name('contactUs.reply');
                Route::delete('/contactUs/destroy/{id}','ContactUsController@destroy')->name('contactUs.destroy');
                Route::get('/contactUs/newMessages','ContactUsController@newMessages')->name('contactUs.newMessages');

                Route::get('/officeDetails','ContactUsController@officeDetails')->name('officeDetails.index');
                Route::put('/officeDetails','ContactUsController@updateOfficeDetails')->name('officeDetails.update');

                Route::resource('whatWeDo', 'WhatWeDoController');
                Route::post('/whatWeDo/itemImageUpload','WhatWeDoController@itemImageUpload')->name('whatWeDo.itemImageUpload');
                Route::post('/whatWeDo/updateSection', 'WhatWeDoController@updateSection')->name('whatWeDo.updateSection');

                Route::resource('careers', 'CareerController');
            });
        });
    });
});

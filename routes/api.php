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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('/user', 'UserController@index');
    Route::resource('/userinfo', 'ProfileController');
    Route::post('/make_dairys', 'StudentPostController@store');
    Route::resource('/interndairys', 'StudentPostController');
    Route::resource('/majors', 'MajorController');
    Route::resource('/jobs', 'JobController');
    Route::resource('/types', 'JoptypeController');
    Route::resource('/courses', 'StudentCoutseController');
    Route::resource('/comevents', 'ComeventController');
    Route::resource('/review', 'StudentReviewController');
    Route::get('/detailreview/{id}', 'StudentReviewController@showdetailreview');
    Route::get('/getcomevent', 'ComeventController@getcomevent');
    Route::get('/getstudent', 'ComeventJoinController@getstudent');
    Route::get('/getstudent/{id}', 'ComeventJoinController@showcomjoin');
    Route::get('/studentconfirm', 'ComeventJoinController@studentconfirm');
    Route::get('/studentconfirm/{id}', 'ComeventJoinController@showstudentconfirm');
    Route::get('/internconfirm', 'ComeventJoinController@internstepconfirm');
    Route::resource('/update', 'ComeventJoinController');
    Route::resource('/updateprofile', 'StudentInfoController');
    Route::post('/comevent_join', 'ComeventJoinController@store');
    Route::resource('/comevent/join', 'ComeventJoinController');
    Route::resource('/company', 'CompanyinfosController');
    Route::post('uploadImage', 'UploadController@uploadImage');
    Route::post('uploadFile', 'UploadController@uploadFile');
    Route::post('uploadCv', 'UploadController@uploadCv');
    Route::post('search', 'ScoreController@search');
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

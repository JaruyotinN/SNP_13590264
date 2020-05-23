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
Route::group(['middleware' => 'AuthTeacher'], function () {
    Route::post('adduser', 'Auth\AdminController@adduser');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('/user', 'UserController@index');
    Route::resource('/userinfo', 'ProfileController');
    Route::post('/make_dairys', 'StudentPostController@store');
    Route::resource('/interndairys', 'StudentPostController');
    Route::resource('/majors', 'MajorController');
    Route::resource('/facultys', 'FacultyController');
    Route::resource('/jobs', 'JobController');
    Route::resource('/types', 'JoptypeController');
    Route::resource('/courses', 'StudentCoutseController');
    Route::get('/allcourses', 'StudentCoutseController@course');
    Route::resource('/calendar', 'InternCalendarController');
    Route::resource('/comevents', 'ComeventController');
    Route::resource('/review', 'StudentReviewController');
    Route::get('/detailreview/{id}', 'StudentReviewController@showdetailreview');
    Route::get('/getcomevent', 'ComeventController@getcomevent');
    Route::get('/getstudent', 'ComeventJoinController@getstudent');
    Route::resource('/comstaff', 'CompanyStaffController');
    Route::resource('/course', 'StudentCoutseController');
    Route::resource('/calendar', 'InternCalendarController');
    

    Route::get('/getjoptype', 'ComeventJoinController@getjoptype');
   
    
    Route::get('/getstudent/{id}', 'ComeventJoinController@showcomjoin');
    Route::get('/studentconfirm', 'ComeventJoinController@studentconfirm');
    Route::get('/studentconfirm/{id}', 'ComeventJoinController@showstudentconfirm');
    Route::get('/internconfirm', 'ComeventJoinController@internstepconfirm');
    Route::resource('/update', 'ComeventJoinController');
    Route::resource('/updateprofile', 'StudentInfoController');
    Route::resource('/updateteacher', 'TeacherinfosController');
    Route::resource('/updatecompany', 'CompanyinfosController');
    Route::post('/comevent_join', 'ComeventJoinController@store');
    Route::post('/comevent_invite', 'ComeventJoinController@cominvite');
    Route::resource('/comevent/join', 'ComeventJoinController');
    Route::resource('/company', 'CompanyinfosController');
    Route::post('uploadImage', 'UploadController@uploadImage');
    Route::post('uploadFile', 'UploadController@uploadFile');
    Route::post('uploadCv', 'UploadController@uploadCv');
    Route::post('uploadTranscript', 'UploadController@uploadTranscript');
    Route::post('search', 'ScoreController@search');
    Route::resource('/updatescore', 'ScoreController');
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::resource('/allstudent', 'TeacherinfosController');
    Route::post('findstudent', 'ScoreController@index');
    Route::get('/alldairy', 'StudentPostController@studentdairy');
    Route::resource('/detaildairy', 'StudentPostController');
    Route::get('/alluniversity', 'FacultyController@getfaculty');
    Route::resource('/authprovince', 'ProvinceController');

});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('createuser', 'Auth\AdminController@createuser');

    Route::resource('/province', 'ProvinceController');
    Route::get('/getfaculty', 'FacultyController@getfaculty');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
    Route::get('/clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return "Routes ,Config ,View is cleared <a href='".url('/')."'>Home</a>";
    });
});

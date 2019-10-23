<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'WelcomeController@index');
Route::get('/posts/{cat_id}', 'WelcomeController@byCategory');
Route::get('/single-post/{id}', 'WelcomeController@singlePost');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('post', 'PostController');
    Route::resource('courses', 'CourseController');
    Route::resource('courseApproval', 'CourseApprovalController');
    Route::get('courseApprovalList', 'CourseApprovalController@ApprovalList')->name('courseApprovalList.index');
    Route::get('myApprovalcourse', 'CourseApprovalController@myCourse')->name('myApprovalcourse');
    Route::match(['get', 'post'], 'coursesApprove/{course}', 'CourseApprovalController@ApproveMe')->name('courseApprove.approveMe');
    Route::match(['get', 'post'], 'ApproveMyCourse/{course}', 'CourseApprovalController@ApproveMyCourse')->name('courseApprove.approveMyCourse');
    Route::get('trashed_posts', 'PostController@trashed')->name('trashed_posts.index');
    Route::put('restore_posts/{post}', 'PostController@restore')->name('restore_posts');
    Route::match(['get', 'post'], 'allposts', 'PostController@AllPost')->name('posts.allPost');
    Route::resource('post/{post}/replies', 'ReplaiesController');
    Route::resource('/poll', 'PollController');
    Route::resource('/pollanswer', 'PollAnswerController');
    Route::get('users/notifications', 'UsersController@notifications')->name('users.notifications');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-teacher', 'UsersController@makeTeacher')->name('users.make-teacher');

});
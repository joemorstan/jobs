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

Route::get('/', function () {
    $cities = App\City::all()->sortBy('name');
    return view('homepage')->with(['title' => 'Jobs', 'cities' => $cities]);
})->name('home');

Route::get('/employer', function () {
    $cities = App\City::all()->sortBy('name');
    return view('employer-homepage')->with(['title' => 'Jobs', 'cities' => $cities]);
})->name('employerHome');

Route::middleware(['visitors'])->group(function() {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@postLogin');

    Route::get('/register', 'RegistrationController@registration')->name('register');
    Route::post('/register', 'RegistrationController@store');

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');

    Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');
    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');
});

Route::post('/logout', 'LoginController@logout')->name('logout');


Route::group(['prefix' => 'dashboard', 'middleware' => 'client'], function() {

    Route::get('/build-resume', 'ResumeController@create')->name('buildResumeGet');
    Route::post('/build-resume', 'ResumeController@store')->name('buildResumePost');

    Route::get('/resumes', 'ResumeController@index')->name('myResumes');
    Route::get('/favorites', 'FavoritesController@favoriteVacancies')->name('favoriteVacancies');

    Route::middleware(['resumeAuthor'])->group(function() {
        Route::get('/resume/edit/{id}', 'ResumeController@edit')->name('editResume');
        Route::put('/resume/update/{id}', 'ResumeController@update')->name('updateResume');
        Route::post('/resume/updateDate/{id}', 'ResumeController@updateDate')->name('updateResumeDate');
        Route::delete('/resume/delete/{id}', 'ResumeController@destroy')->name('deleteResume');
    });

    Route::get('/favorites', 'FavoritesController@favoriteVacancies')->name('favoriteVacancies');

    Route::post('/favorites/vacancy/{id}', 'FavoritesController@addVacancy')->name('addFavoriteVacancy');
    Route::delete('/favorites/vacancy/{id}', 'FavoritesController@removeVacancy')->name('removeFavoriteVacancy');
});


Route::group(['prefix' => '/employer/dashboard', 'middleware' => 'employer'], function() {

    Route::get('/vacancies', 'VacancyController@index')->name('myVacancies');

    Route::get('/build-vacancy', 'VacancyController@create')->name('buildVacancyGet');
    Route::post('/build-vacancy', 'VacancyController@store')->name('buildVacancyPost');;

    Route::middleware(['vacancyAuthor'])->group(function () {
        Route::get('/vacancy/edit/{id}', 'VacancyController@edit')->name('editVacancy');
        Route::put('/vacancy/update/{id}', 'VacancyController@update')->name('updateVacancy');
        Route::post('/vacancy/updateDate/{id}', 'VacancyController@updateDate')->name('updateVacancyDate');
        Route::delete('/vacancy/delete/{id}', 'VacancyController@destroy')->name('deleteVacancy');
    });

    Route::get('/favorites', 'FavoritesController@favoriteResumes')->name('favoriteResumes');

    Route::post('/favorites/resume/{id}', 'FavoritesController@addResume')->name('addFavoriteResume');
    Route::delete('/favorites/resume/{id}', 'FavoritesController@removeResume')->name('removeFavoriteResume');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('adminHome');

    Route::get('/earnings', 'AdminController@earnings');
});

Route::get('/employer/resumes', 'SearchController@resumeSearch')->name('findResume');
Route::get('/vacancies', 'SearchController@vacancySearch')->name('findVacancy');
Route::get('/vacancy/{id}', 'VacancyController@show')->name('vacancyResult');
Route::get('/employer/resume/{id}', 'ResumeController@show')->name('resumeResult');


Route::get('profile', 'ProfileController@profile')->name('profile');
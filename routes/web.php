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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Route::get('logout', 'Auth\LoginController@logout');

    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('users', 'UsersController');
    Route::post('users/update', 'UsersController@update')->name('users.update');
    Route::get('users/destroy/{id}', 'UsersController@destroy');

//Clients
    Route::resource('clients', 'ClientsController');
    Route::post('clients/update', 'ClientsController@update')->name('clients.update');
    Route::get('clients/destroy/{id}', 'ClientsController@destroy');
//categories
    Route::resource('categories', 'CategoryController');
    Route::post('categories/update', 'CategoryController@update')->name('categories.update');
    Route::get('categories/destroy/{id}', 'CategoryController@destroy');

//cases
    Route::resource('cases', 'CasesController'); 
    Route::get('addCase', 'CasesController@getClients');

//Mohdareen
    Route::resource('mohdareen', 'MohdareenController');
    Route::get('mohdareen/getCase/{case_num}', 'MohdareenController@getCaseToSelect');
    Route::post('mohdareen/update', 'MohdareenController@update')->name('mohdareen.update');
    Route::get('mohdareen/destroy/{id}', 'MohdareenController@destroy');
    Route::get('mohdareen/updateStatus/{id}', 'MohdareenController@updateStatus');
    Route::get('mohdareen-export', 'MohdareenController@export');


    Route::get('mohdareendata/{id}', 'HomeController@showMohData');

    Route::get('sessionnotes/{id}', 'HomeController@showSessionNotes');


    Route::get('/getClients', 'MohdareenController@getClients')->name('getClients');

//Case Details
    Route::resource('caseDetails', 'CaseDetailsController');
    Route::get('caseDetails/getSearchResult/{search}', 'CaseDetailsController@getSearchResult');
    Route::post('caseDetails/update', 'CaseDetailsController@update')->name('caseDetails.update');
    Route::post('caseDetails/updateCase', 'CaseDetailsController@updateCase')->name('caseDetails.updateCase');
    Route::post('caseDetails/addNewClient', 'CaseDetailsController@addNewClient')->name('caseDetails.addNewClient');

    Route::get('caseDetails/showSessionData/{id}', 'CaseDetailsController@showSessionData');
    Route::get('caseDetails/destroy/{id}', 'CaseDetailsController@destroy');
    Route::get('caseDetails/deleteClient/{case_id}/{client_id}', 'CaseDetailsController@deleteClient');
    Route::get('caseDetails/updateStatus/{id}', 'CaseDetailsController@updateStatus');
    Route::get('caseDetails/getSessionNotes/{id}', 'CaseDetailsController@getSessionNotes');
    Route::get('caseDetails/getSessions/{id}', 'CaseDetailsController@getSessions');
    Route::get('caseDetails/getClientByType/{type}/{caseId}', 'CaseDetailsController@getClientByType');
//Notes Report in Case Details
    Route::get('caseDetails/printSessionNotes/{id}', 'CaseDetailsController@printSessionNotes');
//Case Report
    Route::get('caseDetails/printCase/{id}', 'CaseDetailsController@printCase');
    //Case delete
    
    Route::get('caseDetails/delete/{id}', 'CaseDetailsController@delete');


//notes operations
    Route::resource('notes', 'Session_NotesController');
    Route::post('notes/update', 'Session_NotesController@update')->name('notes.update');
    Route::get('notes/destroy/{id}', 'Session_NotesController@destroy');
    Route::get('notes/updateStatus/{id}', 'Session_NotesController@updateStatus');
    Route::get('notes/exportNotes/{id}', 'Session_NotesController@exportNotes');

//case attacments

//Reports

    Route::resource('dailyReport', 'ReportsController');

    Route::post('daily', 'ReportsController@search')->name('daily');
    Route::get('dailyReport/{id}/{type}', 'ReportsController@edit');
    Route::get('dailyPdf/{id}/{type}', 'ReportsController@pdfexport');

    Route::get('MonthlyReport', 'ReportsController@monthlyPage');
    Route::get('dailyReport/searchMonthly/{month}/{year}/{type}', 'ReportsController@searchMonthly');
    Route::get('monthlyPdf/{month}/{year}/{type}', 'ReportsController@pdfMonthexport');


//id is for case id
    Route::get('attachment/{id}', 'CaseAttachmentController@index');

    Route::get('attachment/{id}/create', 'CaseAttachmentController@create');

    Route::post('attachment/{id}/store', 'CaseAttachmentController@store');


//id is for attachment

    Route::get('attachment/{id}/edit', 'CaseAttachmentController@edit');

    Route::get('attachment/{id}/delete', 'CaseAttachmentController@destroy');



    Route::post('attachment/{id}/update', 'CaseAttachmentController@update');

//permission

    Route::resource('permission', 'PermissionController');

// client profile 
Route::get('profile/{id}', 'ClientProfileController@profile');


Route::get('profile/deletenote/{id}', 'ClientProfileController@delete_Note');


Route::get('profile/{id}/edit_note', 'ClientProfileController@edit_note');

Route::post('profile/{id}/edit_notes', 'ClientProfileController@update_note');

Route::post('profile/store/{id}', 'ClientProfileController@store');
Route::get('profile/client_cases/{id}', 'ClientProfileController@client_cases');


}

);

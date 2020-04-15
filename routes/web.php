<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('/patient', 'PatientController');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/insert', 'PatientController@insert')->name('patient.insert');
Route::get('/patient/edit/{id}', 'PatientController@edit')->name('patient.edit');
Route::post('/patient/update/{id}', 'PatientController@update')->name('patient.update');
Route::delete('/patient/delete/{id}', 'PatientController@destroy')->name('patient.delete');

Route::resource('/employee', 'EmployeeController');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::post('/employee/insert', 'EmployeeController@insert')->name('employee.insert');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
Route::delete('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.delete');

Route::resource('/inpatient', 'InpatientController');
Route::get('/inpatient/show/{id}', 'InpatientController@show')->name('inpatient.show');
Route::get('/inpatient/create', 'InpatientController@create')->name('inpatient.create');
Route::post('/inpatient/insert', 'InpatientController@insert')->name('inpatient.insert');
Route::get('/inpatient/edit/{id}', 'InpatientController@edit')->name('inpatient.edit');
Route::post('/inpatient/update/{id}', 'InpatientController@update')->name('inpatient.update');

Route::resource('/medicalitem', 'MedicalItemController');
Route::get('/medicalitem/create', 'MedicalItemController@create')->name('medicalitem.create');
Route::post('/medicalitem/insert', 'MedicalItemController@insert')->name('medicalitem.insert');
Route::get('/medicalitem/edit/{id}', 'MedicalItemController@edit')->name('medicalitem.edit');
Route::post('/medicalitem/update/{id}', 'MedicalItemController@update')->name('medicalitem.update');

Route::resource('/appointment', 'AppointmentController');
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('/appointment/insert', 'AppointmentController@insert')->name('appointment.insert');

Route::resource('/room', 'RoomController');
Route::resource('department', 'DepartmentController');

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

    return redirect(route('login'));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//chargeabilities

Route::post('/appointments/addemployee','AppointmentsController@addemployee')->name('appointments.addemployee');
Route::post('/appointments/loadappemployee','AppointmentsController@loadappemployee')->name('appointments.loadappemployee');
Route::post('/appointments/deleteappemployee','AppointmentsController@deleteappemployee')->name('appointments.deleteappemployee');

//payrolls

Route::post('/payrolls/addemployee','PayrollController@addemployee')->name('payrolls.addemployee');
Route::post('/payrolls/loadappemployee','PayrollController@loadappemployee')->name('payrolls.loadappemployee');
Route::post('/payrolls/deleteappemployee','PayrollController@deleteappemployee')->name('payrolls.deleteappemployee');
Route::post('/payrolls/updatedeductionamount','PayrollController@updatedeductionamount')->name('payrolls.updatedeductionamount');
Route::get('/payrolls/preview/{id}','PayrollController@preview')->name('payrolls.preview');
Route::get('/payrolls/printpayslips/{id}','PayrollController@printpayslips')->name('payrolls.printpayslips');
Route::get('/payrolls/sendpayslips/{id}','PayrollController@sendpayslips')->name('payrolls.sendpayslips');
Route::get('/payrolls/printobr/{id}','PayrollController@printobr')->name('payrolls.printobr');
Route::post('/payrolls/copypayroll','PayrollController@copypayroll')->name('payrolls.copypayroll');
Route::post('/payrolls/updaterefundamount','PayrollController@updaterefundamount')->name('payrolls.updaterefundamount');

//payrollitems

Route::get('/payrollitems/{id}','PayrollitemController@show')->name('payrollitems.show');
Route::post('/payrollitems/updatenumdays','PayrollitemController@updatenumdays')->name('payrollitems.updatenumdays');

//pdf

Route::get('/pdf/payslip/{id}','PdfsController@payslip')->name('pdf.payslip');


//employee

Route::post('/employees/updatedeductionstatus','EmployeesController@updatedeductionstatus')->name('employees.updatedeductionstatus');


Route::resource('chargeabilities','ChargeabilitiesController');

Route::resource('employees','EmployeesController');

Route::resource('appointments','AppointmentsController');

Route::resource('payrolls','PayrollController');

Route::resource('deductionitems','DeductionitemsController');

Route::resource('offices','OfficeController');



//reports

Route::get('/reports/employeededuction','ReportsController@employeededuction')->name('reports.employeededuction');


//refund types

Route::resource('refundtypes','RefundtypesController');


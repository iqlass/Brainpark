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
    return view('home');
});
Route::get('emp_login','teachercontroller@login');
Route::get('teacher','teachercontroller@index');
Route::get('class_creation','teachercontroller@class_creation');
Route::get('section_creation','teachercontroller@section_creation');
Route::get('studentcration','teachercontroller@studentcration');
Route::get('create_fee','teachercontroller@create_fee');
Route::post('add_section','teachercontroller@add_section');
Route::post('add_emp','teachercontroller@add_emp');
Route::post('add_class','teachercontroller@add_class');
Route::post('login_valid','teachercontroller@login_valid');
Route::post('add_student','teachercontroller@add_student');
Route::get('del_sec/{sec_id}','teachercontroller@del_sec');
Route::get('edit_sec/{sec_id}','teachercontroller@edit_sec');
Route::get('getlevel/{val}','teachercontroller@getlevel');
Route::get('getprice/{val}','teachercontroller@getprice');
Route::get('getsection/{val}','teachercontroller@getsection');
Route::get('view_studentinfo/{val}','teachercontroller@view_studentinfo');
Route::get('student_delete/{val}','teachercontroller@student_delete');
Route::get('edit_stuent/{val}','teachercontroller@edit_stuent');
Route::post('update_student','teachercontroller@update_student');
Route::get('del_staff/{val}','teachercontroller@del_staff');
Route::get('class_delete/{val}','teachercontroller@class_delete');
Route::get('class_edit/{val}','teachercontroller@class_edit');
Route::get('edit_staff/{val}','teachercontroller@edit_staff');
Route::post('update_class','teachercontroller@update_class');
Route::post('update_sec','teachercontroller@update_sec');
Route::post('update_emp','teachercontroller@update_emp');
Route::post('manage_attendance','teachercontroller@add_attendance');
Route::post('submit_attendance','teachercontroller@submit_attendance');
Route::get('manage_attendance_view','teachercontroller@manage_attendance');
Route::post('set_fee','teachercontroller@set_fee');
Route::get('met_bill','teachercontroller@met_bill');
Route::get('get_met_price/{id}','teachercontroller@get_met_price');
Route::get('getstudent/{id}','teachercontroller@getstudent');
Route::post('insert_bill','teachercontroller@insert_bill');
Route::get('view_bill','teachercontroller@view_bill');
Route::get('create_branch','teachercontroller@create_branch');
Route::post('add_branch','teachercontroller@add_branch');
Route::get('create_ledger','teachercontroller@create_ledger');
Route::post('add_ledger','teachercontroller@add_ledger');
Route::get('create_subledger','teachercontroller@create_subledger');
Route::post('add_subledger','teachercontroller@add_subledger');
Route::get('create_entry','teachercontroller@create_entry');
Route::get('getsubledger/{id}','teachercontroller@getsubledger');
Route::post('add_bookentry','teachercontroller@add_bookentry');

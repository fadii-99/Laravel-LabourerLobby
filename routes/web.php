<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HirerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\WorkerController;
use App\Models\Hirer;
use Illuminate\Http\Request;
use App\Models\Worker;


Route::get('/', function () {    return view('Main/index');});
Route::get('/index', function () {    return view('Main/index');});
Route::get('/complain', function () {    return view('Main/complain');});
Route::get('/complainout', function () {    return view('Main/complainout');});



Route::post('complains',[AccountController::class,'COMPLAIN']);
Route::post('complainsout',[AccountController::class,'COMPLAINOUT']);



//==============================================================================
//=========================== SignUp and Login =====================================
//==============================================================================
Route::get('/signup', function () {    return view('Main/signup');});
Route::post('add-user',[AccountController::class,'CreateAccount']);

Route::get('/login', function () {    return view('Main/login');});
Route::post('Login',[AccountController::class,'AccountLogin']);
Route::get('logout',[AccountController::class,'Logout']);
Route::post('chkotp',[AccountController::class,'chkOTP']);
//==============================================================================
//==============================================================================





//==============================================================================
//=========================== Hirer Routes =====================================
//==============================================================================
Route::post('addDetails', [HirerController::class,'AddDetails']);

//uplod DP
Route::post('uploadH',[HirerController::class,'Uploadfile'])->name('uploadH');
Route::get('exporthirer/{id}',[HirerController::class,'EXPORT']);

//delete account
Route::get('delete/{email}',[HirerController::class,'Delete']);
Route::get('profileh',[HirerController::class,'profileh']);


Route::get('complete',[HirerController::class,'COMPLETED']);
Route::get('history',[HirerController::class,'HISTORY']);
Route::get('deletehistory/{id}',[HirerController::class,'DELETEHISTORY']);
//==============================================================================
//==============================================================================



Route::get('rgc', function () {    return view('Mails/regconfirm');});



//==============================================================================
//=========================== Worker Routes =====================================
//==============================================================================
Route::get('profilew',[WorkerController::class,'profilew']);
Route::post('addDetailsW', [WorkerController::class,'AddDetails']);

//uplod DP
Route::post('uploadW',[WorkerController::class,'Uploadfile'])->name('uploadW');

//delete account
Route::get('deleteW/{email}',[WorkerController::class,'Delete']);

// lobby
Route::get('lobby',[WorkerController::class,'Lobby']);
Route::get('electrician',[WorkerController::class,'electrician']);
Route::get('plumber',[WorkerController::class,'plumber']);
Route::get('carpenter',[WorkerController::class,'carpenter']);
Route::get('completeW',[WorkerController::class,'COMPLETED']);

//
Route::get('hire/{email}',[WorkerController::class,'Hired']);
Route::get('requesthire/{email}',[WorkerController::class,'HREQUEST']);
Route::get('confirm/{email}',[WorkerController::class,'CONFIRMED']);
Route::get('confirmreject/{email}',[WorkerController::class,'REJECT']);
Route::get('historyw',[WorkerController::class,'HISTORY']);


// Route::get()
//==============================================================================
//==============================================================================


//==============================================================================
//=========================== Admin Routes =====================================
//============================================================================== 
Route::get('/admin-admin123', function () {    return view('Admin/admin');});
Route::get('adhirer',[adminController::class,'HIRER']);
Route::get('adworker',[adminController::class,'WORKER']);
Route::get('adwdelete/{id}',[adminController::class,'DELETEW']);
Route::get('adhdelete/{id}',[adminController::class,'DELETEH']);
Route::get('adcomplain',[adminController::class,'COMPLAIN']);
Route::get('adcomplaind/{id}',[adminController::class,'COMPDEL']);
Route::get('adhistory',[adminController::class,'HISTORY']);
Route::get('adhhdelete{id}',[adminController::class,'HISTDEL']);


<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GISController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\SMSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::group(['prefix' => 'create'], function () {
    Route::post('program', [ProgramController::class, 'create']);
	Route::post('beneficiary', [BeneficiaryController::class, 'create']);
	Route::post('payroll', [PayrollController::class, 'create']);
	Route::post('event', [EventController::class, 'create']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('program', [ProgramController::class, 'read'])->name('program');
	Route::get('beneficiary', [BeneficiaryController::class, 'read'])->name('beneficiary');
	Route::get('payroll', [PayrollController::class, 'read'])->name('payroll');
	Route::get('transaction-history', [TransactionController::class, 'read'])->name('transaction-history');
	Route::get('schedule', [EventController::class, 'read'])->name('schedule');
	Route::get('gis', [GISController::class, 'read'])->name('gis');
	Route::get('chat', [ChatController::class, 'read'])->name('chat');
	Route::get('sms-configuration', [SMSController::class, 'read'])->name('sms-configuration');
	
	Route::get('search-beneficiary', [BeneficiaryController::class, 'search'])->name('search-beneficiary');
	Route::get('search-payroll', [PayrollController::class, 'searchPayroll'])->name('search-payroll');
	Route::get('search-transaction', [TransactionController::class, 'searchTransaction'])->name('search-transaction');
	Route::get('search-map-beneficiary', [GISController::class, 'searchMap'])->name('search-map-beneficiary');
});
Route::group(['prefix' => 'read'], function () {
    Route::post('beneficiary', [PayrollController::class, 'search']);
});
Route::group(['prefix' => 'update'], function () {
    Route::post('program', [ProgramController::class, 'update']);
	Route::post('payroll', [PayrollController::class, 'update']);
	Route::post('event', [EventController::class, 'update']);
	Route::post('beneficiary', [BeneficiaryController::class, 'update']);
	Route::post('beneficiary-program', [BeneficiaryController::class, 'updateProgram']);
	Route::post('sms-configuration', [SMSController::class, 'update']);
});
Route::group(['prefix' => 'delete'], function () {
    Route::post('program', [ProgramController::class, 'delete']);
	Route::post('payroll', [PayrollController::class, 'delete']);
	Route::post('transaction', [TransactionController::class, 'delete']);
	Route::post('event', [EventController::class, 'delete']);
	Route::post('beneficiary', [BeneficiaryController::class, 'delete']);
});
Route::group(['prefix' => 'search'], function () {
    Route::post('payroll', [PayrollController::class, 'searchKeyup']);
	Route::post('transaction', [TransactionController::class, 'searchKeyup']);
	Route::post('beneficiary', [BeneficiaryController::class, 'searchKeyup']);
});

Route::group(['prefix' => 'notify'], function () {
    Route::post('read', [NotifyController::class, 'read']);
});

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');

Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::group(['middleware' => 'auth'], function () {
	
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	
	Route::get('user-profile', function () {
		return view('pages.user-profile');
	})->name('user-profile');

});
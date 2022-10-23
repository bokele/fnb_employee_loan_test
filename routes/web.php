<?php

use App\Http\Controllers\loanMnagement\GetLoanContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\LoanTypeController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\Settings\BranchSettingController;
use App\Http\Controllers\Settings\CollateralTypeController;
use App\Http\Controllers\UserManagement\PermissionController;
use App\Http\Controllers\UserManagement\UserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'change_default_password'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {

            Route::name('settings.')->group(function () {
                Route::prefix('settings')->group(function () {
                    Route::resource('branches', BranchSettingController::class)->only('index', 'create', 'edit', 'show');
                    Route::resource('loan-types', LoanTypeController::class)->only('index', 'create', 'edit', 'show');
                    Route::resource('collateral-types', CollateralTypeController::class)->only('index', 'create', 'edit', 'show');
                });
            });
            Route::name('user-management.')->group(function () {
                Route::prefix('user-management')->group(function () {
                    Route::resource('permissions', PermissionController::class)->only('index', 'create', 'edit', 'show');
                    Route::resource('roles', RoleController::class)->only('index', 'create', 'edit', 'show');
                    Route::resource('users', UserController::class)->only('index', 'create', 'edit', 'show');
                });
            });
        });
    });

    Route::name('loan-management.')->group(function () {
        Route::prefix('loan-management')->group(function () {
            Route::resource('get-loans', GetLoanContoller::class)->only('index', 'create', 'edit', 'show');
        });
    });
});

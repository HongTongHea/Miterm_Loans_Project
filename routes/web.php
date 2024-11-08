<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('employees')->group(function () {

    Route::controller(EmployeeController::class)->group(function () {

        Route::get('/', 'index')->name('employees.index');

        Route::get('/create', 'create')->name('employees.create');

        Route::post('/', 'store')->name('employees.store');

        Route::get('{id}/edit', 'edit')->name('employees.edit')->whereNumber('id');

        Route::put('{id}', 'update')->name('employees.update')->whereNumber('id');

        Route::get('{id}/details', 'details')->name('employees.details')->whereNumber('id');

        Route::get('{id}/delete', 'delete')->name('employees.delete')->whereNumber('id');

        Route::delete('{id}', 'destroy')->name('employees.destroy')->whereNumber('id');
    });
});

Route::resource('customers', CustomersController::class);
Route::resource('loans', LoansController::class);
Route::delete('/customers/{customer}', [CustomersController::class, 'destroy'])->name('customers.delete');


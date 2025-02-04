<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Route;




Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login.submit');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('dashboard', DashboardController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('employees', EmployeeController::class);
Route::get('/admin/employees/index', [EmployeeController::class, 'index'])->name('admin.employees.index');
Route::get('/admin/employees/edit', [EmployeeController::class, 'edit'])->name('admin.employees.edit');


Route::resource('departments', DepartmentController::class);
Route::get('/admin/departments/create', [DepartmentController::class, 'create'])->name('admin.departments.create');
Route::get('/admin/departments/index', [DepartmentController::class, 'index'])->name('admin.departments.index');
Route::get('/admin/departments/edit', [DepartmentController::class, 'edit'])->name('admin.departments.edit');



Route::resource('payrolls', PayrollController::class);
Route::get('/admin/payrolls/create', [DepartmentController::class, 'create'])->name('admin.payrolls.create');
Route::get('/admin/payrollss/index', [DepartmentController::class, 'index'])->name('admin.payrolls.index');



Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/export/pdf', [ReportController::class, 'exportPDF'])->name('reports.export.pdf');




Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
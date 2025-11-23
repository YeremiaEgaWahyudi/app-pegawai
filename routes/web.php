<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('projects', ProjectController::class);
Route::post('projects/{project}/add-employee', [ProjectController::class, 'addEmployee'])->name('projects.addEmployee');
Route::delete('projects/{project}/remove-employee/{employee}', [ProjectController::class, 'removeEmployee'])->name('projects.removeEmployee');
Route::resource('dashboard', DashboardController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);


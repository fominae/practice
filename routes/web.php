<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/add_employee', [Controller\Admin::class, 'add_employee'])->middleware('auth', 'roleAdmin');
Route::add('GET', '/home', [Controller\Site::class, 'index']);
Route::add(['GET', 'POST'], '/create', [Controller\Employee::class, 'add_employee'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/employee', [Controller\Employee::class, 'employee'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/add_departmen', [Controller\Employee::class, 'add_departmen'])->middleware('auth', 'roleEmployee');
Route::add('GET', '/edit', [Controller\Employee::class, 'edit'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/create_employee', [Controller\Employee::class, 'create_employee'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/attaching_department', [Controller\Employee::class, 'attaching_department'])->middleware('auth', 'roleEmployee');
Route::add('GET', '/calculate_employees', [Controller\Employee::class, 'calculateEmployees'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/all_employee', [Controller\Employee::class, 'all_employee'])->middleware('auth', 'roleEmployee');
Route::add(['GET', 'POST'], '/search_employee', [Controller\Employee::class, 'search_employee'])->middleware('auth', 'roleEmployee');



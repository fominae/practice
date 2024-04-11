<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/add_employee', [Controller\Admin::class, 'add_employee'])->middleware('auth', 'roleAdmin');
Route::add('GET', '/home', [Controller\Site::class, 'index']);
Route::add('GET', '/create', [Controller\Employee::class, 'add_employee'])->middleware('auth', 'roleEmployee');
Route::add('GET', '/employee', [Controller\Employee::class, 'employee'])->middleware('auth', 'roleEmployee');

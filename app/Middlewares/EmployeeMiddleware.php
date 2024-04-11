<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class EmployeeMiddleware
{
    public function handle()
    {
        if (Auth::checkRole()) {
            app()->route->redirect('/home');
        }
    }
}
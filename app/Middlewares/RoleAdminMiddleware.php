<?php

namespace Middlewares;

use Src\Auth\Auth;

class RoleAdminMiddleware
{
    public function handle()
    {
        if (!Auth::checkRole()) {
            app()->route->redirect('/home');
        }
    }
}
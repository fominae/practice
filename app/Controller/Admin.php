<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;


class Admin
{
    public function add_employee(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/add_employee');
        }
        return new View('site.add_employee');
    }
}
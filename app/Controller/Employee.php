<?php

namespace Controller;

use Model\User;
use Src\Request;
use Src\View;


class Employee
{
    public function employee(): string
    {
        return new View('site.employee');
    }

    public function add_employee(): string
    {
        return new View('site.create');
    }
}


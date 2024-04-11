<?php

namespace Controller;

use Src\View;


class Employee
{
    public function employee(): string
    {
        return new View('site.employee');
    }
}
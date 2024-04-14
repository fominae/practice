<?php

namespace Controller;

use Model\User;
use Src\Request;
use Src\View;
use Model\Department_type;
use Model\Department;
use Model\Employees;
use Model\Current_position;
use Model\Position;
use Model\Staff;
class Employee
{
    public function employee(): string
    {
        return new View('site.employee');
    }

    public function add_employee(Request $request): string
    {
        if ($request->method === 'POST'){
            $employee = Employees::create($request->all());
            if($employee){
                $_SESSION['employee_id']=$employee->id;
                app()->route->redirect('/create_employee');
            }
        }
        $staff = Staff:: all();
        return new View('site.create',['staff' =>$staff]);
    }

    public function create_employee(Request $request): string
    {
        if($request->method==='POST' && Department::create($request->all()) && Current_position::create($request->all()) ){
            app()->route->redirect('/employee');
        }
        $departments = Department::all();
        $department_types = Department_type::all();
        $employees = Employees::all();
        $current_positions = Current_position::all();
        $positions = Position::all();
        return new View('site.create_employee',['departments' => $departments,'employees' => $employees,'current_positions' => $current_positions, 'positions' => $positions, 'department_types' => $department_types ]);
    }

    public function edit(): string
    {
        return new View('site.edit');
    }
}


<?php

namespace Controller;

use Model\Department_employees;
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
    public function employee(Request $request): string
    {
        $employees = Employees::all();
        $departments = Department::all();
        $department_types = Department_type::all();
        $positions= Position::all();
        $current_positions=Current_position::all();
        $staffs = Staff::all();
        $department_employees = Department_employees::all();
        return new View('site.employee',['positions' => $positions,'current_positions' => $current_positions,'department_employees' => $department_employees,'employees' => $employees,'staffs' => $staffs, 'departments'=>$departments, 'department_types' =>$department_types]);
    }


    public function add_employee(Request $request): string
    {
        if ($request->method === 'POST'){
            $employee = Employees::create($request->all());
            if($employee){
                $_SESSION['employeer_id']=$employee->id;
                app()->route->redirect('/create_employee');
            }
        }
        $staff = Staff:: all();
        return new View('site.create',['staff' =>$staff]);
    }

    public function create_employee(Request $request): string
    {
        if($request->method==='POST' && Department_employees::create($request->all())  && Department::create($request->all()) && Current_position::create($request->all()) ){
            app()->route->redirect('/employee');
        }
        $department_employees = Department_employees::all();
        $departments = Department::all();
        $department_types = Department_type::all();
        $employees = Employees::all();
        $current_positions = Current_position::all();
        $positions = Position::all();
        return new View('site.create_employee',['departments' => $departments,'employees' => $employees,'current_positions' => $current_positions, 'positions' => $positions, 'department_types' => $department_types, 'department_employees' =>$department_employees ]);
    }

    public function add_departmen(Request $request): string
    {
        if($request->method === 'POST') {
            // Получаем данные из свойств объекта Request
            $data = [
                'departmen_type_id' => $request->departmen_type_id,
                'title' => $request->title,
            ];
            if(Department::create($data)){
                app()->route->redirect('/employee');
            }
        }
        $departments = Department::all();
        $department_types = Department_type::all();
        return new View('site.add_departmen', ['department_types' => $department_types, 'departments' => $departments]);
    }

    public function edit(): string
    {
        return new View('site.edit');
    }
    public function attaching_department(Request $request): string
    {
        if($request->method === 'POST') {
            if(Department_employees::create($request->all())){
                app()->route->redirect('/employee');
            }
        }
        $departments = Department::all();
        $employees = Employees::all();
        return new View('site.attaching_department',['employees' => $employees,'departments' => $departments,]);
    }
}


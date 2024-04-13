<?php

namespace Controller;

use Model\User;
use Src\Request;
use Src\View;
use Model\Department_type;
use Model\Department;


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

    public function add_departmen(Request $request): string
    {
        if($request->method === 'POST') {
            // Получаем данные из свойств объекта Request
            $data = [
                'departmen_type_id' => $request->departmen_type_id,
                'title' => $request->title,
                // 'number_staff' => $request->number_staff, // если у вас есть это поле в форме
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
}


<?php

namespace Controller;

use Model\Department_employees;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Model\Department_type;
use Model\Department;
use Model\Employees;
use Model\Current_position;
use Model\Position;
use Model\Staff;
use Model\Article;
use function Search\search_in_data;

class Employee
{
    public function employee(Request $request): string
    {
        $employees = Employees::all();
        $departments = Department::all();
        $department_types = Department_type::all();
        $positions = Position::all();
        $current_positions = Current_position::all();
        $staffs = Staff::all();
        $department_employees = Department_employees::all();
        return new View('site.employee', ['positions' => $positions, 'current_positions' => $current_positions, 'department_employees' => $department_employees, 'employees' => $employees, 'staffs' => $staffs, 'departments' => $departments, 'department_types' => $department_types]);
    }


    public function add_employee(Request $request): string
    {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'surname' => ['required'],
                'name' => ['required'],
                'birthdate' => ['required', 'birthdate'],
                'address' => ['required'],
                'staff_id' => ['required']
            ], [
                'required' => 'Поле пусто',
                'birthdate' => 'Возраст должен быть не менее 16 лет'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
            }

            $employee = Employees::create($request->all());
            if (empty($errors) && $employee) {
                $_SESSION['employeer_id'] = $employee->id;
                app()->route->redirect('/create_employee');
            }
        }
        $staff = Staff:: all();
        return new View('site.create', ['staff' => $staff, 'errors' => $errors]);
    }

    public function create_employee(Request $request): string
    {
        if ($request->method === 'POST' && Department_employees::create($request->all()) && Current_position::create($request->all())) {
            app()->route->redirect('/employee');
        }
        $department_employees = Department_employees::all();
        $departments = Department::all();
        $department_types = Department_type::all();
        $employees = Employees::all();
        $current_positions = Current_position::all();
        $positions = Position::all();
        return new View('site.create_employee', ['departments' => $departments, 'employees' => $employees, 'current_positions' => $current_positions, 'positions' => $positions, 'department_types' => $department_types, 'department_employees' => $department_employees]);
    }

    public function add_departmen(Request $request): string
    {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required', 'unique:departments,title'],
            ], [
                'required' => 'Поле не может быть пустым',
                'unique' => 'Поле должно быть уникально'

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
            }
            $data = [
                'departmen_type_id' => $request->departmen_type_id,
                'title' => $request->title,
            ];
            if (empty($errors) && Department::create($data)) {
                app()->route->redirect('/employee');
            }
        }
        $departments = Department::all();
        $department_types = Department_type::all();
        return new View('site.add_departmen', ['department_types' => $department_types, 'departments' => $departments, 'errors' => $errors]);
    }

    public function edit(): string
    {
        return new View('site.edit');
    }

    public function attaching_department(Request $request): string
    {
        $errors = [];
        if ($request->method === 'POST') {
            $employeer_id = $request->get('employeer_id');
            $department_id = $request->get('department_id');

            $existingRecord = Department_employees::where('employeer_id', $employeer_id)
                ->where('department_id', $department_id)
                ->first();

            if ($existingRecord) {
                $errors['department'] = 'Сотрудник уже прикреплен к этому подразделению';
            } else {
                if (Department_employees::create($request->all())) {
                    app()->route->redirect('/employee');
                }
            }
        }
        $departments = Department::all();
        $employees = Employees::all();
        return new View('site.attaching_department', ['employees' => $employees, 'departments' => $departments, 'errors' => $errors]);
    }

    public function search_employee(Request $request): string
    {
        $search = $request->get('search');
        $employees = Employees::all()->toArray();
        $searchResults = [];
        foreach ($employees as $employee) {
            $results = search_in_data($search, $employee)->search($search, $employee);
            if (!empty($results)) {
                foreach ($results as $result) {
                    $searchResults[] = $result;
                }
            }
        }
        if (empty($searchResults)) {
            return new View('site.all_employee', ['message' => 'Такого сотрудника нет']);
        } else {
            $employees = Employees::whereIn('patronymic', $searchResults)
                ->orWhereIn('name', $searchResults)
                ->orWhereIn('surname', $searchResults)
                ->get();
            return new View('site.all_employee', ['employees' => $employees]);
        }
    }


    public function all_employee(): string
    {
        $employees = Employees::all();
        return new View('site.all_employee', ['employees' => $employees]);
    }
    public function add_article(Request $request): string
    {
        if ($request->method === 'POST') {
            $file = $request->files();
            $path = $file['image']['name'];
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/practice/public/media/";
            $target_file = $target_dir . basename($path);

            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            if (Article::create(['title' => $request->title, 'description' => $request->description, 'image' => '/practice/public/media/' . $_FILES['image']['name'] . $_FILES['image']['title']])) {
                app()->route->redirect('/home');
            }
        }
        return new View('site.add_article');
    }

}
<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Validator\Validator;

class Admin
{
    public function add_employee(Request $request): string
    {
        $errors = [];
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле пусто',
                'unique' => 'Поле должно быть уникально'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
            }

            if (empty($errors) && User::create($request->all())) {
                app()->route->redirect('/add_employee');
            }
        }
        return new View('site.add_employee',['errors' => $errors]);
    }
}

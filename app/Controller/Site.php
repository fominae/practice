<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


class Site
{
    public function index(): string
    {
        return new View('site.home');
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'NoneExistedLogin'],
                'password' => ['required'],
            ], [
                'required' => 'Поле не может быть пустым',
                'NoneExistedLogin' => 'Логин не существует',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
            }
            if (empty($errors) && Auth::attempt($request->all()) && Auth::checkRole()) {
                app()->route->redirect('/add_employee');
            } else if (empty($errors) && Auth::attempt($request->all())) {
                app()->route->redirect('/employee');
            }
        }
        return new View('site.login', ['errors' => $errors]);
    }


    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

}

<?php

namespace Validators;

use Src\Validator\AbstractValidator;
use Model\User;

class NoneExistedLoginValidator extends AbstractValidator
{
    protected string $message = 'Логин не существует';

    public function rule(): bool
    {
        $user = User::where('login', $this->value)->first();

        if ($user) {
            return true;
        }

        return false;
    }
}

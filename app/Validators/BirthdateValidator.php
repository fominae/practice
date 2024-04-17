<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthdateValidator extends AbstractValidator
{
    protected string $message = 'Возраст должен быть не менее 16 лет';

    public function rule(): bool
    {
        $birthdate = new \DateTime($this->value);
        $limit = new \DateTime();
        $limit->modify('-16 years');


        return $birthdate <= $limit;
    }
}
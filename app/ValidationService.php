<?php

namespace app;

class ValidationService
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $file): void
    {
        $this->validator->validate($file);
    }
}

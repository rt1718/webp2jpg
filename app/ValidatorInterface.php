<?php

namespace app;

interface ValidatorInterface
{
    public function validate(array $file): void;
}
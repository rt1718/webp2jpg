<?php

namespace app;

class Validator implements ValidatorInterface
{

    public function validate(array $file): void
    {
        $allowedTypes = ['image/webp', 'image/png'];
        $mimeType = mime_content_type($file['tmp_name']) ?: '';
        if (!in_array($mimeType, $allowedTypes, true)) {
            throw new \Exception("Неверный формат файла.");
        }
    }
}
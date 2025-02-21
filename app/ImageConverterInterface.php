<?php

namespace app;

interface ImageConverterInterface
{
    public function convert(string $filePath, string $title, int $quality): string;
}

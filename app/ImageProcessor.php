<?php

namespace app;

class ImageProcessor
{
    private ImageConverterInterface $converter;

    public function __construct(ImageConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function process(string $filePath, string $title, int $quality): string
    {
        return $this->converter->convert($filePath, $title, $quality);
    }
}

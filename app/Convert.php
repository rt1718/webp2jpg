<?php

namespace app;

use Imagick;

class Convert implements ImageConverterInterface
{
    /**
     * @throws \ImagickException
     */
    public function convert(string $filePath, string $title = 'image', int $quality = 90): string
    {
        $imagick = new Imagick($filePath);
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompressionQuality($quality);

        $outputPath = dirname($filePath) . '/' . $title . '.jpg';
        $imagick->writeImage($outputPath);

        $imagick->clear();
        $imagick->destroy();

        return $outputPath;
    }
}

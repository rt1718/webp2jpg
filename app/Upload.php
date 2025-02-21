<?php

namespace app;

class Upload implements FileUploaderInterface
{
    private array $file;
    private string $title;
    private int $quality;
    private ValidationService $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;

        $this->file = [];
        $this->title = '';
        $this->quality = 90;
    }

    public function upload(array $file, string $title = 'image', int $quality = 90): void
    {
        $this->validationService->validate($file);
        $this->file = $file;
        $this->title = !empty($title)
            ? htmlspecialchars(trim($title), ENT_QUOTES, 'UTF-8') : 'изображение';
        $this->quality = $quality;
    }

    public function getFile(): array
    {
        if (empty($this->file)) {
            throw new \Exception("Файл ещё не загружен.");
        }
        return $this->file;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }
}

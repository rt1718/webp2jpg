<?php

namespace app;

interface FileUploaderInterface
{
    public function upload(array $file): void;
}

<?php
require_once '../vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use app\Upload;
use app\Convert;
use app\Validator;
use app\ValidationService;

    $validator = new Validator();
    $validationService = new ValidationService($validator);
    $upload = new Upload($validationService);

    $upload->upload($_FILES['file'], $_POST['title']
        ?? 'converted-image', $_POST['quality'] ?? 90);

    $filePath = $upload->getFile()['tmp_name'];
    $title = $upload->getTitle();
    $quality = isset($_POST['quality']) && is_numeric($_POST['quality'])
        ? (int)$_POST['quality'] : 90;

    $convert = new Convert();
    $jpegPath = $convert->convert($filePath, $title, $quality);

    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=\"{$title}.jpg\"");
    readfile($jpegPath);


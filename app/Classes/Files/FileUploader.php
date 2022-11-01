<?php


namespace App\Classes\Files;


use Illuminate\Http\UploadedFile;

class FileUploader
{
    public function upload(UploadedFile $file, string $path): string
    {
        return 'some path';
    }
}

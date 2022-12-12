<?php


namespace App\Classes\Files;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public function upload(UploadedFile $file, string $path): string
    {
        return Storage::disk('public')->put($path, $file);
    }

    public function remove(string $path): bool
    {
        return Storage::disk('public')->delete($path);
    }
}

<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    protected function saveFacultyResume($file)
    {
        $path = 'resume';
        $filename = md5(date('Y-m-d H:i:s') . microtime() . time()) . strtolower(Str::random()) . '.' . $file->extension();
        $disk = 'public';
        Storage::disk($disk)->put("{$path}/{$filename}", file_get_contents($file));
        $file = "{$path}/{$filename}";
        return  'storage/' . $file;
    }

    protected function saveAvatar($file)
    {
        $path = 'avatar';
        $filename = md5(date('Y-m-d H:i:s') . microtime() . time()) . strtolower(Str::random()) . '.' . $file->extension();
        $disk = 'public';
        Storage::disk($disk)->put("{$path}/{$filename}", file_get_contents($file));
        $file = "{$path}/{$filename}";
        return  'storage/' . $file;
    }

    protected function saveReviewImage($file)
    {
        $path = 'review';
        $filename = md5(date('Y-m-d H:i:s') . microtime() . time()) . strtolower(Str::random()) . '.' . $file->extension();
        $disk = 'public';
        Storage::disk($disk)->put("{$path}/{$filename}", file_get_contents($file));
        $file = "{$path}/{$filename}";
        return  'storage/' . $file;
    }
}

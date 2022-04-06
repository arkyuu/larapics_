<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public static function makeDirectory()
    {
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public static function getDimension($image)
    {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width . "x" . $height;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function fileUrl()
    {
        $path = "/storage/" . $this->file;
        return $path;
    }

    public function permalink()
    {
        return route('images.show', $this->slug);
    }
}

<?php

namespace App\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadMediaAction
{
    /**
     * Get url
     */
    public function url($path)
    {
        return Storage::disk(config('filesystems.default'))->url($path);
    }

    /**
     * Store image to storage
     */
    public function store($path, $image)
    {
        return Storage::disk(config('filesystems.default'))->put($path, $image);
    }

    /**
     * Delete image from storage
     */
    public function delete($image)
    {
        if ($image) Storage::disk(config('filesystems.default'))->delete($image);
    }

    /**
     * Create from URL
     */
    public function createFromUrl(string $path, string $url)
    {
        $imageContent = file_get_contents($url);

        if ($imageContent === false) {
            throw new \RuntimeException(sprintf('Unable to get the content of the URL: %s.', $url));
        }

        $imageName =  "/$path/" . Str::random(40) . '.png';

        Storage::disk(config('filesystems.default'))->put($imageName, $imageContent);

        return $imageName;
    }
}

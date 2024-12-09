<?php

namespace App\Traits;

trait PictureSource
{
    private function getImageExtension($source)
    {
        if (is_string($source)) {
            $imageContents = file_get_contents($source);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($imageContents);

            return match ($mimeType) {
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp',
                default => null,
            };
        }

        return $source->getClientOriginalExtension();
    }
}


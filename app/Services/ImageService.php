<?php

namespace App\Services;

use App\Models\Image;
use App\Traits\ImageManipulator;

class ImageService extends BaseService
{
    use ImageManipulator;

    public function __construct(Image $image)
    {
        $this->model = $image;
    }

    public function createImages($images, $ad)
    {
        foreach ($images as $image) {
            $manipulatedImage = $this->manipulateImage($image);

            $newImage = new $this->model;
            $newImage->url = $manipulatedImage;
            $newImage->ad_id = $ad->id;
            $newImage->save();
        }
    }
}

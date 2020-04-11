<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait ImageManipulator
{
    public function manipulateImage($image)
    {
        $mImage = Image::make($image);
        $mImage = $mImage->resize(740, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $mImage = $mImage->crop(700, 500);

        $fileName = time() . rand(10, 99) . '.jpg';
        $filePath = public_path('uploads/images/' . $fileName);
        $mImage->save($filePath, 90, 'jpg');

        return $fileName;
    }
}

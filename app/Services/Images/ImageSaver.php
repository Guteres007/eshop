<?php

namespace App\Services\Images;

use Illuminate\Support\Facades\Storage;

class ImageSaver
{

    private $folder_destination;

    public function make($image)
    {
        $path = Storage::putFileAs($this->folder_destination, $image, $image->getClientOriginalName());
        return $path;
    }

    public function setDestionation($destination)
    {
        $this->folder_destination = "/product-images/" . $destination;
    }
}

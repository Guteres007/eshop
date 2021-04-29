<?php

namespace App\Services\Images;

use Illuminate\Support\Facades\Storage;

class ImageRemover
{

    private $folder_destination;

    public function make($image_name)
    {
        $path = Storage::delete($this->folder_destination . $image_name);
        return $path;
    }

    public function setDestionation($destination)
    {
        $this->folder_destination = $destination;
    }
}

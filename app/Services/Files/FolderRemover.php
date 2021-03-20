<?php

namespace App\Services\Files;

use Illuminate\Support\Facades\Storage;

class FolderRemover
{
    private $folder_destination;

    public function make($folder_name)
    {
        return  Storage::deleteDirectory($this->folder_destination . $folder_name);
    }

    public function setDestionation($destination)
    {
        $this->folder_destination = $destination;
    }
}

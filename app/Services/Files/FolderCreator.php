<?php

namespace App\Services\Files;

use Illuminate\Support\Facades\Storage;

class FolderCreator
{

    public function make($folder_name)
    {
        if (!Storage::directories('/product-images/' . $folder_name)) {
            Storage::makeDirectory('/product-images/' . $folder_name);
        }
    }
}

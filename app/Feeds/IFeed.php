<?php


namespace App\Feeds;


interface IFeed
{
    public function exportProducts();
    public function saveToFile($storagePath);
}

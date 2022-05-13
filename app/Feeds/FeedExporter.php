<?php


namespace App\Feeds;


class FeedExporter
{
    public function createXml(IFeed $feed, $storagePath) {
        $feed->exportProducts();
        $feed->saveToFile($storagePath);
    }
}

<?php


namespace App\Services\Admin;


use App\Feeds\FeedExporter;

class FeedService
{
    private $feedExporter;
    public function __construct(FeedExporter $feedExporter)
    {
        $this->feedExporter = $feedExporter;
    }

    public function generateFeedByName($feedName)
    {
        if(isset($feedName)) {
            $fileName = strtolower($feedName);
            $className = ucfirst($fileName);
            $feedClass = "\\App\\Feeds\\{$className}";
            $this->feedExporter->createXml(new $feedClass, 'xml/'.$fileName.'.xml');
        }
    }

}

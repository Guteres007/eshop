<?php

namespace App\Http\Controllers\Admin;

use App\Feeds\FeedExporter;
use App\Http\Controllers\Controller;
use App\Feeds\Google;


class FeedController extends Controller
{
    public function generate($type , FeedExporter $feedExporter)
    {
        $feedExporter->createXml(new Google(),'xml/google.xml');

        return response('ok')->header('Content-type', 'text/xml');
    }
}

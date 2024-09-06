<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Template\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ViewController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($filename)
    {
        $final_path = "/templates/" . $filename;
        return Storage::disk("templates")->download($final_path);
    }
}

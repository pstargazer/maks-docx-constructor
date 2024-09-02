<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use ;

class GetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    public function __invoke($filename)
    {
        // return('test');
        $final_path = "/templates/" . $filename;
        return Storage::disk("templates")->download($final_path);
    }
}

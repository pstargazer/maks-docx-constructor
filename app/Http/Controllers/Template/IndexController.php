<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Template\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $templates = $this->service->index(10);
        // $templates = Template::paginate(10);
        return view("templates.index", compact("templates"));
    }
}

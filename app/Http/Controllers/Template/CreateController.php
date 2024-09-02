<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Template\BaseController;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        return view("templates.create");
    }
}

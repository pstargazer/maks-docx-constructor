<?php

namespace App\Http\Controllers\Template\Api;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $template = Template::paginate(5)->toArray();
        return response($template);
    }
}

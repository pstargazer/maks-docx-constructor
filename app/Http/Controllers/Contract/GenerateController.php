<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Contract\BaseController;
use Illuminate\Http\Request;

class GenerateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $this->service->generateDOCX(1, 3, []);
    }
}

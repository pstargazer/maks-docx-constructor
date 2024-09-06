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
        // dd($request->client_id);
        // dd($request["client_id"]);
        // return $request;
        //
        return $this->service->generateDOCX(
            $request->template_id,
            $request->client_id,
            []
        );
    }
}

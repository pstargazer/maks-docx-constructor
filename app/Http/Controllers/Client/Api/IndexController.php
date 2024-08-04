<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Client\BaseController;
use App\Models\Client;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clients = Client::paginate(5)->toArray();
        return response($clients);
    }
}

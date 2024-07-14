<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Template;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $templates = Template::all();
        $client_id = $request->client_id;
        if ($client_id && intval($client_id)) {
            $client = Client::find($client_id);
            return view("contract.create", compact("templates", "client"));
        }
        return view("templates", "contract.create");
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Http\Controllers\Client\BaseController as BaseController;
use Http;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    protected $PER_PAGE = 10;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $input = $request->input();
        // dd($input);

        $clients = null;
        if (isset($input["search"])) {
            $clients = $this->service->mColSearch(
                $input["search"],
                $this->PER_PAGE
            );
        }

        $single = null;
        if (isset($input["record_id"])) {
            $single = Client::find($input["record_id"]);
            $single->name_prefix_short = $this->service->shortname(
                $single->name_prefix
            );
            $single->initials = $this->service->makeInitials(
                $single->delegate_name,
                $single->delegate_th_name
            );
            $coords = $this->service->getCoords($single->address);

            $single->lat = $coords[0];
            $single->lon = $coords[1];

            // $single->lat = "61.8021048";
            // $single->lon = "50.74312225";
        }

        // if no search required
        if (empty($clients)) {
            $clients = Client::paginate($this->PER_PAGE);
        }
        foreach ($clients as $client) {
            // dump($client);
            $client->name_prefix_short = $this->service->shortname(
                $client->name_prefix
            );
            $client->initials = $this->service->makeInitials(
                $client->delegate_name,
                $client->delegate_th_name
            );
        }
        // dd($clients);
        return view("client.index2", compact("clients", "single"));
    }
}

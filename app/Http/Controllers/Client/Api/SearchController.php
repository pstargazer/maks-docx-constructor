<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const PER_PAGE = 5;
    public function __invoke($search)
    {
        $clients = Client::orWhere("name_prefix", "like", "%" . $search . "%")
            ->orWhere("company_name", "like", "%" . $search . "%")
            ->orWhere("delegate_surname", "like", "%" . $search . "%")
            ->orWhere("delegate_name", "like", "%" . $search . "%")
            ->orWhere("delegate_th_name", "like", "%" . $search . "%")
            ->paginate(5);
        return $clients;
    }
}

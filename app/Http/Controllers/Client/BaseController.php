<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateController;

use App\Services\ClientService;

class BaseController extends IlluminateController
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;
    function __construct(ClientService $service)
    {
        $this->service = $service;
    }
}

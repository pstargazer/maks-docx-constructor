<?php

namespace App\Http\Controllers\Contract;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateController;

use App\Services\ContractService;

class BaseController extends IlluminateController
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;
    function __construct(ContractService $service)
    {
        $this->service = $service;
    }
}

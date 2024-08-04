<?php

namespace App\Http\Controllers\Template;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateController;

use App\Services\TemplateService;

class BaseController extends IlluminateController
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;
    function __construct(TemplateService $service)
    {
        $this->service = $service;
    }
}

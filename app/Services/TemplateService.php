<?php

namespace App\Services;
use App\Models\Template;

class TemplateService
{
    /**
     * @return void
     */
    public function index($per_page)
    {
        $templates = Template::all()->paginate($per_page);
        return $templates
    }

    public function create() {

    }
}

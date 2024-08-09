<?php

namespace App\Services;
use App\Models\Template;
use Illuminate\Support\Str;

class TemplateService
{
    /**
     * @return void
     */
    public function index($per_page)
    {
        $templates = Template::paginate($per_page);
        return $templates;
    }

    /**
     * @return string
     */
    public function storeFile($file, $name = "")
    {
        $name = Str::ascii($name);
        $filename =
            "template_" .
            $name .
            "_" .
            time() .
            "." .
            $file->getClientOriginalExtension();
        $storePath = "public/templates";
        $file->storeAs($storePath, $filename);
        return $storePath . "/" . $filename;
    }

    /**
     * @return int
     * store the newly recieved template into DB
     */
    public function storeRecord($data, $filename)
    {
        $id = Template::create([
            "name" => $data->name,
            "filename" => $filename,
            "escaping_start" => $data->escaping_start,
            "escaping_end" => $data->escaping_end,
        ])->id;
        return $id;
    }
}

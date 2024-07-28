<?php

// namespace App\Http\Controllers\Contract;
namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use clsTinyButStrong;
use OpenTBS\tbs_plugin_opentbs;

use App\Models\Contract;
use App\Models\Client;

class ContractService
{
    protected $tbs; //tinybutstrong object
    protected $contractinfo, $templateinfo;

    public function __construct()
    {
        $this->tbs = new clsTinyButStrong([
            "chr_open" => "{",
            "chr_close" => "}",
            "noerr" => true,
        ]);
        $this->tbs->Plugin(TBS_INSTALL, "clsOpenTBS");
    }

    private function getContractInfo()
    {
    }

    private function getTemplateInfo()
    {
    }

    public function store()
    {
    }

    // Entrypoint of creating docx
    public function generateDOCX($templateId, $clientId, $data)
    {
        $template_name = "postavka_software.docx";
        $this->tbs->LoadTemplate(
            storage_path("app/public/templates/" . $template_name),
            OPENTBS_ALREADY_UTF8
        );
        $contractdata_tmp = [
            "contract_name" => "",
            "number" => 1,
            "date" => date("d.m.Y"),
        ];
        $clientdata_tmp = Client::find($clientId)->toArray();
        // $clientdata_tmp = array_map(function ($curr) {

        // },$clientdata);

        $clientdata = $this->tbs->MergeBlock("client,contract ", "array", [
            "contract" => $contractdata_tmp,
            "client" => $clientdata_tmp,
        ]);

        $outputPath = storage_path(
            "app/public/generated_doc/" . time() . ".docx"
        );
        // do not show output file
        $data = $this->tbs->Show(OPENTBS_DOWNLOAD, time() . ".docx");
        // store to storage
        $stored = Storage::disk("public")->put(
            "generated_doc/" . time() . ".docx",
            $this->tbs->Source
        );

        if ($stored) {
            return $outputPath;
        } else {
            return null;
        }
    }
}

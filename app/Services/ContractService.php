<?php

namespace App\Services;

// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use clsTinyButStrong;
// use OpenTBS\tbs_plugin_opentbs;

use App\Models\Contract;
use App\Models\Client;
use App\Models\Template;

class ContractService
{
    public function __construct()
    {
        $this->tbs = new clsTinyButStrong([
            "chr_open" => "{",
            "chr_close" => "}",
            "noerr" => true,
        ]);
        $this->tbs->Plugin(TBS_INSTALL, "clsOpenTBS");
    }

    protected $tbs; //tinybutstrong object
    protected $contractinfo, $templateinfo;

    /**
     * @return void
     */
    private function getContractInfo(): void
    {
    }
    /**
     * @return void
     */
    private function getTemplateInfo(): void
    {
    }
    /**
     * @return void
     */
    public function store(): void
    {
    }

    /*
     * Entrypoint of creating docx
     * @param int $templateId
     * @param int $clientId
     * @param array $data
     *
     * @return path of newly stored document string|null
     *
     */
    public function generateDOCX(int $templateId, int $clientId, array $data)
    {
        // $template_name = "postavka_software.docx";
        $template_name = Template::find($templateId)->filename;
        // dd($templateId);
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
        // dd($clientdata_tmp);

        $storedPath = "generated_" . time() . ".docx";

        $clientdata = $this->tbs->MergeBlock("client", "array", [
            "client" => $clientdata_tmp,
        ]);

        $clientdata = $this->tbs->MergeBlock("contract", "array", [
            "contract" => $contractdata_tmp,
        ]);

        $outputPath = storage_path(
            "app/public/generated_doc/" . time() . ".docx"
        );
        // do not show output file
        // $data = $this->tbs->Show(OPENTBS_DOWNLOAD, time() . ".docx");
        // $data = $this->tbs->Source;
        // return $data;
        // store to storage
        //
        $this->tbs->Show(OPENTBS_STRING);
        $string = $this->tbs->Source;

        $stored = Storage::disk("generated")->put(
            $storedPath,
            $this->tbs->Source
        );
        // dd($stored);

        if ($stored) {
            $storedContent = Storage::download(
                "public/generated_doc/" . $storedPath
            );
            return $storedContent;
        } else {
            return null;
        }
    }
}

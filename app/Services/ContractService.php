<?php

// namespace App\Http\Controllers\Contract;
namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use clsTinyButStrong;
use OpenTBS\tbs_plugin_opentbs;

class ContractService
{
    protected $tbs; //tinybutstrong object

    public function __construct()
    {
        $this->tbs = new clsTinyButStrong([
            "chr_open" => "{",
            "chr_close" => "}",
            "noerr" => false,
        ]);
        $this->tbs->Plugin(TBS_INSTALL, "clsOpenTBS");
    }

    // Entrypoint of creating docx
    public function generateDOCX($templateId, $data)
    {
        $this->tbs->LoadTemplate(
            storage_path("app/public/templates/test.docx")
        );

        $this->tbs->MergeBlock("client", "array", [
            "client" => [
                "inn" => "1234567890",
                "phone" => "+71234567890",
                "bik" => "bikbikbik",
            ],
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

<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Template\BaseController;
use App\Http\Requests\Template\CreateRequest;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $file = $request->file("file");
        $file_path = $this->service->storeFile($file, $request->name);
        // $data = [];
        $id = $this->service->storeRecord($request, $file_path);
        return response()->json([
            "message" => "File uploaded successfully",
            "id" => $id,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // $contracts = Contract::all();
        $contracts = [
            [
                "title" => 'КМ-ЗПДНа-2018-2',
                "client" => 'МАОУДО «ЭДМШ»',
                "date" => '29.12.2017'
            ]
        ];
        
        return view('contract.index', compact('contracts'));
    }
}

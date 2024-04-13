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
        $contracts = Contract::all();
       
        return view('contract.index', compact('contracts'));
    }
}

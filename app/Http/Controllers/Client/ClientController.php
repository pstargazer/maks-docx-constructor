<?php

namespace App\Http\Controllers\Client;

use App\Models\Bank;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ValidateRequest as ClientValidateRequest;
use Redirect;

class ClientController extends Controller
{

    public function create() {
        $banks = Bank::all();
        return view('client.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientValidateRequest $request)
    {
        // dd($request);
        // $validator = \Validator::make();
        // if ($validator->fails()) {
        //     $error = $validator->errors()->first();
        //     return Redirect::back()->withErrors($validator);
        // }
        $validated = $request->validated();
        Client::create($validated);
        return redirect(route('client.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}

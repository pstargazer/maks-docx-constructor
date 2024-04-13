<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected function shortname($name){
        // FIXME: NORMALIZE DB
        // $name = strpos($name, "\"");
        // if there's no quotation for name
        $regexp = "";
        $have_subname = preg_match("/\".+\"$/i", $name);
        $already_abbr  = "//";
        // dump($valid);
        if ($have_subname) return $name;
        $words = explode(' ',$name);
        // dump($words);
        $name = array_reduce($words, function ($carry,$i){
            $char = "";
            if (strlen($i) > 2) $char = mb_strtoupper(mb_substr($i,0,1));
            return $carry . $char;
        },'');
        // dd($name);
        return $name;
    }

    protected function makeInitials($name, $th_name = ''){
        // return $surname[0] .". {$th_name[0]}.";
        if(strlen($th_name) > 0) return mb_substr($name,0,1) . "." . mb_substr($th_name,0,1) . ".";
        else return mb_substr($name,0,1);
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $clients = Client::paginate(10);
        foreach ($clients as $idx=>$client){
            // dump($client);
            $client->name_prefix_short = $this->shortname($client->name_prefix);
            $client->initials = $this->makeInitials($client->delegate_name, $client->delegate_th_name);
        }
        // dd($clients);
        $looooong = "";
        return view('client.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers\Client;


use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected function shortname($name){
        // FIXME: NORMALIZE DB
        // $name = strpos($name, "\"");
        
        // if there's no quotation for name
        $have_subname = preg_match("/\".+\"$/i", $name);
        // $already_abbr  = "//";
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

    /**
     *  shorten the initials of delegate
     */
    protected function makeInitials($name, $th_name = ''){
        // return $surname[0] .". {$th_name[0]}.";
        if(strlen($th_name) > 0) return mb_substr($name,0,1) . "." . mb_substr($th_name,0,1) . ".";
        else return mb_substr($name,0,1) . ".";
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clients = Client::paginate(10);
        foreach ($clients as $idx => $client) {
            // dump($client);
            $client->name_prefix_short = $this->shortname($client->name_prefix);
            $client->initials = $this->makeInitials($client->delegate_name, $client->delegate_th_name);
        }
        // dd($clients);
        return view('client.index', compact('clients'));
    }
}

<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    /*
     *  Multicolumn search
     *  search the content on all possible columns
     */
    public function mColSearch($search_seed, $per_page)
    {
        $clients = Client::orWhere("name_prefix", "like", "%{$search_seed}%")
            ->orWhere("company_name", "like", "%{$search_seed}%")
            ->orWhere("delegate_surname", "like", "%{$search_seed}%")
            ->orWhere("delegate_name", "like", "%{$search_seed}%")
            ->orWhere("delegate_th_name", "like", "%{$search_seed}%")
            ->paginate($per_page);
        return $clients;
    }

    /**
     *  shorten the initials of delegate
     */
    public function makeInitials($name, $th_name = "")
    {
        // return $surname[0] .". {$th_name[0]}.";
        if (strlen($th_name) > 0) {
            return mb_substr($name, 0, 1) .
                "." .
                mb_substr($th_name, 0, 1) .
                ".";
        } else {
            return mb_substr($name, 0, 1) . ".";
        }
    }

    /**
     *   make the short name of organisation
     *   i.e shorten the prefix to abbreviations
     */
    public function shortname($name)
    {
        // FIXME: NORMALIZE DB
        // $name = strpos($name, "\"");

        // if there's no quotation for name
        $have_subname = preg_match("/\".+\"$/i", $name);
        // $already_abbr  = "//";
        // dump($valid);
        if ($have_subname) {
            return $name;
        }
        $words = explode(" ", $name);
        // dump($words);
        $name = array_reduce(
            $words,
            function ($carry, $i) {
                $char = "";
                if (strlen($i) > 2) {
                    $char = mb_strtoupper(mb_substr($i, 0, 1));
                }
                return $carry . $char;
            },
            ""
        );
        // dd($name);
        return $name;
    }

    /**
     *   get coords of given address using geocoder
     *   if fails, returns  [0,0]
     */
    public function getCoords($address)
    {
        // $response = null;
        try {
            $response = Http::get(
                "https://nominatim.openstreetmap.org/search?q={$address}&format=json"
            );
            $body = json_decode($response->body(), JSON_UNESCAPED_UNICODE);
            // dd($body);
            if (count($body) > 1) {
                return [$body[0]["lat"], $body[0]["lon"]];
            } elseif (!isset($body["lat"]) || !isset($body["lon"])) {
                return [0, 0];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return [0, 0];
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ServerDetailsController extends Controller
{
    public function api(){
        $now = Carbon::now();
        $timeZone = $now->getTimezone();
        $date = $now->format('Y-m-d H:i:s');
        $datenow = $now->format('Y-m-d H:i:s'); 
        return response()->json(['timezone' => $timeZone, 'date' => $date, 'date' => $datenow, 'time' => $now->getTimestamp() ]);
    }

    public function server(){
        $response = $this->api();
        $json = $response->getContent();
        $array = json_decode($json, true);
        $date = $array['date'];
        $time = $array['time'];
        $timezone = $array['timezone']['timezone'];
        return view('ServerDetails.index', compact('date','timezone','time'));
        
    }
}

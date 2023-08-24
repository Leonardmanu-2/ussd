<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\States\Amount\Welcome;

class UssdController extends Controller
{
    public function handleUssd(Request $request)
    {
        $ussd = Ussd::machine()
            ->setFromRequest([
                'phone_number' => $request->input('msisdn'),
                'input' => $request->input('msg'),
                'network' => $request->input('network'),
                'session_id' => $request->input('UserSessionID'),
            ])
            ->setInitialState(Welcome::class)
            ->setResponse(function(string $message, string $action) {
                return [
                    'USSDResp' => [
                        'action' => $action,
                        'menus' => '',
                        'title' => $message,
                    ]
                ];
            });

        return response()->json($ussd->run());
    }
}
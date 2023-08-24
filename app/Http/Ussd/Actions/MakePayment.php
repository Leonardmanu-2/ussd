<?php

namespace App\Http\Ussd\Actions;

use Sparors\Ussd\Action;
use Illuminate\Support\Facades\Http;
use App\Http\Ussd\States\PaymentSuccess;
use App\Http\Ussd\States\PaymentError;



class MakePayment extends Action
{
    public function run(): string
    {
        $response = Http::post('/payment', ['phone_number' => $this->record->phoneNUmber]); 

        if ($response->ok()){
            return PaymentSuccess::class;
        }

        return PaymentError::class;
    }
}

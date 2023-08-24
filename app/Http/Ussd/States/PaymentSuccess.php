<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;
use App\Http\Controllers\UssdController; 

class PaymentSuccess extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Your payment has been completed with the amount:')
        ->lineBreak(2)
        ->listing([
            'OK'
        ])
        
        ->lineBreak(2)
        ->text('Powered by Korba');
    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->any(Welcome::class);
    }
}

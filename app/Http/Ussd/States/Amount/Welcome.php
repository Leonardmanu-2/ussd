<?php

namespace App\Http\Ussd\States\Amount;

use Sparors\Ussd\State;
use App\Http\Ussd\States\PaymentSuccess;
use App\Http\Ussd\States\PaymentError;

class Welcome extends State

{
    protected function beforeRendering(): void
    {
        $this->menu->text('Welcome to Christ Vision Sanctuary')
             ->lineBreak(1)
             ->line('Please enter the amount you want to pay')

             ->lineBreak(2)
             ->text('Powered by Korba');

    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->amount(MakePayment::class);
    }
}

<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class PaymentError extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('INVALID');
    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->any(Welcome::class);
    }
}

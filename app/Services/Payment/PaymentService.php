<?php


namespace App\Services\Payment;


use App\Payment;

class PaymentService
{
    public function handleInitialBuy(Payment $payment)
    {
        // Initial buy logic
        // Create invoice
        // Use transaction
    }

    protected function handleCancellation(Payment $payment)
    {
        // Update database
        // Log
        // Send email
    }
}

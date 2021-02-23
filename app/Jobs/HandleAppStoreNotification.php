<?php

namespace App\Jobs;

use App\Payment;
use App\Services\Payment\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;
use Spatie\WebhookClient\ProcessWebhookJob;

class HandleAppStoreNotification extends ProcessWebhookJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var PaymentService
     */
    private $service;

    /**
     * Create a new job instance.
     *
     * @param WebhookCall $webhookCall
     * @param PaymentService $service
     */
    public function __construct(WebhookCall $webhookCall, PaymentService $service)
    {
        parent::__construct($webhookCall);
        $this->service = $service;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Move switch to parent class to avoid code duplication
        $payload = $this->webhookCall['payload'];
        switch ($payload['type'])
        {
            case 'INITIAL_BUY': $this->service->handleInitialBuy($this->extract($payload)); break;
        }
    }

    /**
     * Extract generic data
     *
     * @param $data
     * @return Payment
     */
    function extract($data)
    {
        $array['some_field'] = $data['someField'];
        $array['another_field'] = $data['anotherField'];

        return new Payment($array);
    }
}

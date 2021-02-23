<?php

use App\Jobs\AppstoreNotifications\HandleCancellation;
use App\Jobs\AppstoreNotifications\HandleDidFailToRenew;
use App\Jobs\AppstoreNotifications\HandleDidRenew;
use App\Jobs\AppstoreNotifications\HandleInitialBuy;

return [
    /*
     * Apple will send the shared secret with the request that should match
     * the one you use when validating receipts.
     * https://developer.apple.com/documentation/storekit/in-app_purchase/enabling_server-to-server_notifications?language=objc#overview
     */
    'shared_secret' => env('APPLE_SHARED_SECRET'),
    /*
     * All the events that should be handled by your application.
     * Typically you should uncomment all jobs
     *
     * You can find a list of all notification types here:
     * https://developer.apple.com/documentation/storekit/in-app_purchase/enabling_server-to-server_notifications?language=objc#3162176
     */
    'jobs' => [
        'initial_buy' => HandleInitialBuy::class,
        'cancel' => HandleCancellation::class,
        'did_fail_to_renew' => HandleDidFailToRenew::class,
        'did_renew' => HandleDidRenew::class, // Does not work in this package
    ],
];

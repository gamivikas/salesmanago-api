<?php

require_once __DIR__.'/../../vendor/autoload.php'; // Autoload files using Composer autoload

use Pixers\SalesManagoAPI\Client;
use Pixers\SalesManagoAPI\Service\EmailService;

$data = [
    'user' => '*****',
    'emailId' => '********',
    'contacts' => [
        [
            'email' => '**********',
            'contactId' => null,
            'properties' => [],
        ]
    ],
    'date' => date('c', time()),
];

$clientId = '******';
$endPoint = '***.salesmanago.pl'; // ex. app3.salesmanago.pl
$apiSecret = '******';
$apiKey = '******';

try {
    $salesManagoClient = new Client($clientId, $endPoint, $apiSecret, $apiKey);
    $emailService = new EmailService($salesManagoClient);

    $response = $emailService->create($data);
    var_dump($response);
} catch (Exception $e) {
    echo $e->getMessage();
    var_dump($e->getRequestData());
    var_dump($e->getResponseData());
}

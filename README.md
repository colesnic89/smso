# SMSO API
### SMSO API PHP implementation

Welcome to the SMSO API! You can use this package to access SMSO API endpoints.

## Authentication
SMSO uses API keys to allow access to the API. You can register a new SMSO API key at their [developer page](https://app.smso.ro/developers/api).

## Installation
`composer require colesnic89/smso`

## Usage

```php
<?php

use SMSO\ApiClient;

// initialize ApiClient
$apiClient = new ApiClient('your-api-token-here');

// get list senders
$smsSenders = $apiClient->getSenders();

foreach ($smsSenders as $sender) {
    echo $sender->getId();
    echo $sender->getName();
    echo $sender->getPricePerMessage();
}

// send SMS message
$sendMessageResponse = $apiClient->sendMessage('+40123456789', 'Message text', $smsSenders[0]->getId());

echo $sendMessageResponse->getStatus();
echo $sendMessageResponse->getResponseToken();

// check message status
$checkStatusResponse = $apiClient->checkMessageStatus($sendMessageResponse->getResponseToken());

echo $checkStatusResponse->getStatus();
echo $checkStatusResponse->getData()->getStatus();
echo $checkStatusResponse->getData()->getSentAt();
echo $checkStatusResponse->getData()->getDeliveredAt();
echo $checkStatusResponse->getData()->getReceiver()->getNumber();
echo $checkStatusResponse->getData()->getReceiver()->getMcc();
echo $checkStatusResponse->getData()->getReceiver()->getMnc();

// check remaining credit
$checkRemainingCreditResponse = $apiClient->checkRemainingCredit();

echo $checkRemainingCreditResponse->getStatus();
echo $checkRemainingCreditResponse->getCreditValue();
```

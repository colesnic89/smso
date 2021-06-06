<?php

namespace SMSO;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SMSO\Model\CheckRemainingCreditResponse;
use SMSO\Model\MessageStatusResponse;
use SMSO\Model\Sender;
use SMSO\Model\SendMessageResponse;

/**
 * Class ApiClient
 * @package SMSO
 */
class ApiClient implements ApiClientInterface
{

    const BASE_API_URL = 'https://app.smso.ro/api/v1/';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string|null
     */
    private $defaultSender;

    /**
     * ApiClient constructor.
     *
     * @param string $apiKey
     * @param string|null $defaultSender
     */
    public function __construct(string $apiKey, string $defaultSender = null)
    {
        $this->apiKey = $apiKey;
        $this->defaultSender = $defaultSender;
    }

    /**
     * @inheritDoc
     */
    public function getSenders(): array
    {
        $response = $this->createHttpClient()
            ->request('GET', self::BASE_API_URL.'senders')
            ->getBody()
            ->getContents();

        return array_map(function ($item) {
            return Sender::create($item);
        }, json_decode($response));
    }

    /**
     * @inheritDoc
     */
    public function sendMessage(string $to, string $body, ?int $senderId = null, string $type = null): SendMessageResponse
    {
        $senderId = $senderId ?? $this->defaultSender;

        if (null === $senderId) {
            throw new Exception("Undefined sender ID");
        }

        $response = $this->createHttpClient()
            ->request('POST', self::BASE_API_URL.'send', [
                'form_params' => [
                    'to' => $to,
                    'body' => $body,
                    'sender' => $senderId,
                    'type' => $type,
                ],
            ])
            ->getBody()
            ->getContents();

        return SendMessageResponse::create(json_decode($response));
    }

    /**
     * @inheritDoc
     */
    public function checkMessageStatus(string $responseToken): MessageStatusResponse
    {
        $response = $this->createHttpClient()
            ->request('POST', self::BASE_API_URL.'status', [
                'form_params' => [
                    'responseToken' => $responseToken,
                ],
            ])
            ->getBody()
            ->getContents();

        return MessageStatusResponse::create(json_decode($response));
    }

    /**
     * @inheritDoc
     */
    public function checkRemainingCredit(): CheckRemainingCreditResponse
    {
        $response = $this->createHttpClient()
            ->request('GET', self::BASE_API_URL.'credit-check')
            ->getBody()
            ->getContents();

        return CheckRemainingCreditResponse::create(json_decode($response));
    }

    /**
     * @return Client
     */
    private function createHttpClient(): Client
    {
        return new Client([
            'headers' => [
                'X-Authorization' => $this->apiKey,
            ],
        ]);
    }

}

<?php

namespace SMSO;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use SMSO\Model\CheckRemainingCreditResponse;
use SMSO\Model\MessageStatusResponse;
use SMSO\Model\Sender;
use SMSO\Model\SendMessageResponse;

/**
 * Class SmsoApiClientInterface
 * @package SMSO
 */
interface SmsoApiClientInterface
{

    /**
     * This method retrieves all available SMS senders
     *
     * @return Sender[]
     * @throws GuzzleException
     */
    function getSenders(): array;

    /**
     * This method sends an SMS Message
     *
     * @param string $to E.164 Format. The + is optional
     * @param string $body Contents of the message
     * @param int|null $senderId The ID of the sender
     * @param string|null $type Type of the message. Can be 'marketing' or 'transactional', based on the type of communication the message is intended for. Used to filter out unsubscribed users when set to 'marketing'.
     * @return SendMessageResponse
     * @throws GuzzleException
     * @throws Exception
     */
    public function sendMessage(string $to, string $body, ?int $senderId = null, string $type = null): SendMessageResponse;

    /**
     * This method check message status
     *
     * @param string $responseToken
     * @return MessageStatusResponse
     * @throws GuzzleException
     */
    public function checkMessageStatus(string $responseToken): MessageStatusResponse;

    /**
     * This method returns the remaining credit
     *
     * @return CheckRemainingCreditResponse
     * @throws GuzzleException
     */
    public function checkRemainingCredit(): CheckRemainingCreditResponse;

}

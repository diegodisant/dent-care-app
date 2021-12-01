<?php
declare(strict_types=1);

namespace App\Service\Communication;

use App\Service\Communication\Config\TwilioConfig;
use Twilio\Rest\Client;

class TwilioSmsService implements TwilioSmsServiceInterface
{
    const MESSAGE_CONFIG_FROM = 'from';
    const MESSAGE_CONFIG_BODY = 'body';

    private TwilioConfig $config;

    private Client $client;

    public function __construct(TwilioConfig $config)
    {
        $this->config = $config;
        $this->client = new Client(
            $this->config->getAccountSid(),
            $this->config->getAuthToken(),
        );
    }

    public function send(string $phone, string $message): void
    {
        $this->client->messages->create(
            $phone,
            $this->buildSmsMessage($message)
        );
    }

    private function buildSmsMessage(string $messageBody): array
    {
        return [
            self::MESSAGE_CONFIG_FROM => $this->config->getVirtualPhone(),
            self::MESSAGE_CONFIG_BODY => $messageBody
        ];
    }
}

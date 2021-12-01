<?php
declare(strict_types=1);

namespace App\Service\Communication\Config;

class TwilioConfig
{
    private const SERVICE_CONFIG_SID = 'sid';
    private const SERVICE_CONFIG_TOKEN = 'token';
    private const SERVICE_CONFIG_NUMBER = 'number';

    private string $accountSid;

    private string $authToken;

    private string $virtualPhone;

    public function __construct(
        string $accountSid,
        string $authToken,
        string $virtualPhone
    ) {
        $this->accountSid = $accountSid;
        $this->authToken = $authToken;
        $this->virtualPhone = $virtualPhone;
    }

    public function getAccountSid(): string
    {
        return $this->accountSid;
    }

    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    public function getVirtualPhone(): string
    {
        return $this->virtualPhone;
    }

    public static function fromServiceConfig(array $config): self
    {
        return new static(
            $config[self::SERVICE_CONFIG_SID],
            $config[self::SERVICE_CONFIG_TOKEN],
            $config[self::SERVICE_CONFIG_NUMBER],
        );
    }
}

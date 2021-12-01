<?php
declare(strict_types=1);

namespace App\Service\Communication;

interface TwilioSmsServiceInterface
{
    public function send(string $phone, string $message): void;
}

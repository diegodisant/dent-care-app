<?php
declare(strict_types=1);

namespace App\Providers;

use App\Service\Communication\Config\TwilioConfig;
use App\Service\Communication\TwilioSmsService;
use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{
    private const CONFIG_FIELD = 'twilio';

    public function register(): void
    {
        $this->app->singleton(TwilioSmsService::class, function ($app) {
            $serviceConfig = config(self::CONFIG_FIELD);
            $twilioConfig = TwilioConfig::fromServiceConfig($serviceConfig);

            return new TwilioSmsService($twilioConfig);
        });
    }

    public function boot(): void
    {

    }
}

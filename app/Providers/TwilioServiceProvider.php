<?php
declare(strict_types=1);

namespace App\Providers;

use App\Service\Communication\Config\TwilioConfig;
use App\Service\Communication\TwilioSmsService;
use App\Service\Communication\TwilioSmsServiceInterface;
use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{
    private const CONFIG_FIELD = 'twilio';

    public function register(): void
    {
        $this->app->singleton(TwilioSmsServiceInterface::class, function ($app) {
            $serviceConfig = config(self::CONFIG_FIELD);

            if ($serviceConfig === null) {
                $serviceConfig = [
                    TwilioConfig::SERVICE_CONFIG_SID => env('TWILIO_SID'),
                    TwilioConfig::SERVICE_CONFIG_TOKEN => env('TWILIO_AUTH_TOKEN'),
                    TwilioConfig::SERVICE_CONFIG_NUMBER => env('TWILIO_NUMBER'),
                ];
            }

            $twilioConfig = TwilioConfig::fromServiceConfig($serviceConfig);

            return new TwilioSmsService($twilioConfig);
        });
    }

    public function boot(): void
    {

    }
}

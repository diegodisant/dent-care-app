<?php
declare(strict_types=1);

namespace App\Http\Response\Api;

use Illuminate\Http\JsonResponse;

abstract class AbstractResponseInterface extends JsonResponse implements ApiResponseInterface
{
    protected function buildData(
        array $data,
        string $message
    ): array {
        return [
            self::FIELD_DATA => $data,
            self::FIELD_ERROR_MESSAGE => $message,
        ];
    }
}

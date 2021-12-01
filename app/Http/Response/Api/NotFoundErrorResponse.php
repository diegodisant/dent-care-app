<?php
declare(strict_types=1);

namespace App\Http\Response\Api;

class NotFoundErrorResponse extends AbstractResponseInterface
{
    private const MESSAGE = 'Unable to find resource type (%s) with id (%s)';

    public function __construct(
        string $resourceType,
        int $resourceId,
        array $data = []
    ) {
        $data[self::FIELD_RESOURCE] = $data;
        $data[self::FIELD_RESOURCE_ID] = $resourceId;
        $data[self::FIELD_RESOURCE_TYPE] = $resourceType;

        $message = sprintf(
            self::MESSAGE,
            $resourceType,
            $resourceId
        );

        parent::__construct(
            $this->buildData($data, $message),
            self::HTTP_STATUS_NOT_FOUND
        );
    }
}

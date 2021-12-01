<?php
declare(strict_types=1);

namespace App\Http\Response\Api;

class FailedUpdateResponse extends AbstractResponseInterface
{
    private const MESSAGE = 'A resource with type (%s) and id (%d) was updated with failure, please send again';

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
            $this->buildData(
                $data,
                $message
            ),
            self::HTTP_STATUS_BAD_REQUEST
        );
    }
}

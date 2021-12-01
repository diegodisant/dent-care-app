<?php
declare(strict_types=1);

namespace App\Http\Response\Api;


class FailedCreationResponse extends AbstractResponseInterface
{
    private const MESSAGE = 'A resource with type (%s) was created with failure, please send again';

    public function __construct(
        string $resourceType,
        array $data = []
    ) {
        $data[self::FIELD_RESOURCE] = $resourceType;
        $data[self::FIELD_RESOURCE_TYPE] = $resourceType;

        $message = sprintf(self::MESSAGE, $resourceType);

        parent::__construct(
            $this->buildData(
                $data,
                $message
            ),
            self::HTTP_STATUS_BAD_REQUEST
        );
    }
}

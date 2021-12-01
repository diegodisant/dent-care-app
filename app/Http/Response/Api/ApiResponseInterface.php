<?php
declare(strict_types=1);

namespace App\Http\Response\Api;

interface ApiResponseInterface
{
    public const FIELD_DATA = 'data';
    public const FIELD_RESOURCE = 'resource';
    public const FIELD_ERROR_MESSAGE = 'error_message';
    public const FIELD_RESOURCE_TYPE = 'resource_type';
    public const FIELD_RESOURCE_ID = 'resource_id';

    public const HTTP_STATUS_OK = 200;
    public const HTTP_STATUS_CREATED = 201;
    public const HTTP_STATUS_BAD_REQUEST = 400;
    public const HTTP_STATUS_NOT_FOUND = 404;
}

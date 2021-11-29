<?php
declare(strict_types=1);

namespace App\Models;

interface ModelInterface
{
    public const DB_FIELD_ID = 'id';
    public const DB_FIELD_ACTIVE = 'deleted_at';
}

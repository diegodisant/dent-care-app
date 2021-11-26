<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model implements ModelInterface
{
    use HasFactory;

    public const TABLE_NAME = 'appointments';

    public const DB_FIELD_FK_PATIENT = 'fk_patient';
    public const DB_APPOINTMENT_AT = 'appointment_at';
    public const DB_FIELD_STATUS = 'status';

    public const STATUS_ACTIVE = 'active';
    public const STATUS_DELETED = 'deleted';
    public const STATUS_RESCHEDULED = 're-scheduled';

    public const ALLOWED_STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_DELETED,
        self::STATUS_RESCHEDULED,
    ];

    protected $fillable = [
        self::DB_FIELD_FK_PATIENT,
        self::DB_APPOINTMENT_AT,
        self::DB_FIELD_STATUS,
    ];

    protected $casts = [
        self::DB_APPOINTMENT_AT => 'datetime',
    ];
}

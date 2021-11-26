<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistory extends Model implements ModelInterface
{
    use HasFactory;

    public const TABLE_NAME = 'clinical_histories';

    public const DB_COLUMN_FK_PATIENT = 'fk_patient';
    public const DB_COLUMN_MARITAL_STATUS = 'marital_status';
    public const DB_COLUMN_BORN_PLACE = 'born_place';
    public const DB_COLUMN_DEGREE = 'degree';
    public const DB_COLUMN_JOB = 'job';
    public const DB_COLUMN_SEX_TYPE = 'sex_type';
    public const DB_COLUMN_ASSURANCE_TYPE = 'assurance_type';
    public const DB_COLUMN_NSS = 'nss';

    public const SEX_TYPE_MALE = 'male';
    public const SEX_TYPE_FEMALE = 'female';
    public const ALLOWED_SEX_TYPES = [
        self::SEX_TYPE_MALE,
        self::SEX_TYPE_FEMALE,
    ];

    public const ASSURANCE_TYPE_IMSS = 'imss';
    public const ASSURANCE_TYPE_ISSTE = 'isste';
    public const ALLOWED_ASSURANCE_TYPES = [
        self::ASSURANCE_TYPE_IMSS,
        self::ASSURANCE_TYPE_ISSTE,
    ];

    public const MARITAL_STATUS_SINGLE = 'single';
    public const MARITAL_STATUS_DIVORCED = 'divorced';
    public const MARITAL_STATUS_MARRIED = 'married';
    public const ALLOWED_MARITAL_STATUSES = [
        self::MARITAL_STATUS_SINGLE,
        self::MARITAL_STATUS_DIVORCED,
        self::MARITAL_STATUS_MARRIED,
    ];

    protected $fillable = [
        self::DB_COLUMN_FK_PATIENT,
        self::DB_COLUMN_MARITAL_STATUS,
        self::DB_COLUMN_BORN_PLACE,
        self::DB_COLUMN_DEGREE,
        self::DB_COLUMN_JOB,
        self::DB_COLUMN_SEX_TYPE,
        self::DB_COLUMN_ASSURANCE_TYPE,
        self::DB_COLUMN_NSS,
    ];
}

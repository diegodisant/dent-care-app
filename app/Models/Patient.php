<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model implements ModelInterface
{
    use HasFactory;

    public const TABLE_NAME = 'patients';

    public const DB_FIELD_FK_USER = 'fk_user';
    public const DB_FIELD_NAME = 'name';
    public const DB_FIELD_PHONE_NUMBER = 'phone_number';
    public const DB_FIELD_BIRTH_DATE = 'birth_date';
    public const DB_FIELD_ADDRESS = 'address';

    protected $fillable = [
        self::DB_FIELD_FK_USER,
        self::DB_FIELD_NAME,
        self::DB_FIELD_PHONE_NUMBER,
        self::DB_FIELD_BIRTH_DATE,
        self::DB_FIELD_ADDRESS,
    ];

    protected $casts = [
        self::DB_FIELD_BIRTH_DATE => 'date',
    ];
}

<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements ModelInterface
{
    use HasApiTokens, HasFactory, Notifiable;

    public const TABLE_NAME = 'users';

    public const DB_FIELD_NAME = 'name';
    public const DB_FIELD_EMAIL = 'email';
    public const DB_FIELD_PASSWORD = 'password';
    public const DB_FIELD_USER_TYPE = 'user_type';
    public const DB_FIELD_REMEMBER_TOKEN = 'remember_token';
    public const DB_FIELD_EMAIL_VERIFIED_AT = 'email_verified_at';

    public const USER_TYPE_ADMIN = 'admin';
    public const USER_TYPE_PATIENT = 'patient';

    public const ALLOWED_USER_TYPES = [
        self::USER_TYPE_ADMIN,
        self::USER_TYPE_PATIENT,
    ];

    protected $fillable = [
        self::DB_FIELD_NAME,
        self::DB_FIELD_EMAIL,
        self::DB_FIELD_PASSWORD,
        self::DB_FIELD_USER_TYPE,
    ];

    protected $hidden = [
        self::DB_FIELD_PASSWORD,
        self::DB_FIELD_REMEMBER_TOKEN,
    ];

    protected $casts = [
        self::DB_FIELD_EMAIL_VERIFIED_AT => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        if (isset($attributes[self::DB_FIELD_PASSWORD])) {
            $attributes[self::DB_FIELD_PASSWORD] = Hash::make(
                $attributes[self::DB_FIELD_PASSWORD]
            );
        }

        parent::__construct($attributes);
    }
}

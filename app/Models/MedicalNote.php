<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalNote extends Model implements ModelInterface
{
    use HasFactory, SoftDeletes;

    public const TABLE_NAME = 'medical_notes';

    public const DB_FIELD_FK_APPOINTMENT = 'fk_appointment';
    public const DB_FIELD_APPLIED_TREATMENT = 'applied_treatment';
    public const DB_FIELD_ADDITIONAL_NOTES = 'additional_notes';

    protected $fillable = [
        self::DB_FIELD_FK_APPOINTMENT,
        self::DB_FIELD_APPLIED_TREATMENT,
        self::DB_FIELD_ADDITIONAL_NOTES,
    ];
}

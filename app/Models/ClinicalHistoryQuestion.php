<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistoryQuestion extends Model implements ModelInterface
{
    use HasFactory;

    public const TABLE_NAME = 'clinical_history_questions';

    public const DB_FIELD_FK_CLINICAL_HISTORY_SECTION = 'fk_clinical_history_section';
    public const DB_FIELD_QUESTION = 'question';
    public const DB_FIELD_TYPE = 'type';

    public const QUESTION_TYPE_INPUT = 'text-input';
    public const QUESTION_TYPE_YES_OR_NO = 'yes-or-no';
    public const ALLOWED_QUESTION_TYPES = [
        self::QUESTION_TYPE_INPUT,
        self::QUESTION_TYPE_YES_OR_NO,
    ];

    protected $fillable = [
        self::DB_FIELD_FK_CLINICAL_HISTORY_SECTION,
        self::DB_FIELD_QUESTION,
        self::DB_FIELD_TYPE,
    ];
}

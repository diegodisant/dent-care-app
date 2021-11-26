<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistoryAnswer extends Model implements ModelInterface
{
    use HasFactory;

    public const TABLE_NAME = 'clinical_history_answers';

    public const DB_FIELD_FK_CLINICAL_HISTORY = 'fk_clinical_history';
    public const DB_FIELD_FK_CLINICAL_HISTORY_QUESTION = 'fk_clinical_history_question';
    public const DB_FIELD_ANSWER = 'answer';

    protected $fillable = [
        self::DB_FIELD_FK_CLINICAL_HISTORY,
        self::DB_FIELD_FK_CLINICAL_HISTORY_QUESTION,
        self::DB_FIELD_ANSWER,
    ];
}

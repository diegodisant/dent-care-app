<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClinicalHistorySection extends Model implements ModelInterface
{
    use HasFactory, SoftDeletes;

    public const TABLE_NAME = 'clinical_history_sections';

    public const DB_FIELD_TITLE = 'title';

    protected $fillable = [
        self::DB_FIELD_TITLE,
    ];
}

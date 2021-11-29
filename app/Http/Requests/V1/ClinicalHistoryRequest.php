<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\ClinicalHistory as Model;

class ClinicalHistoryRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            Model::DB_COLUMN_FK_PATIENT => 'required|numeric',
            Model::DB_COLUMN_MARITAL_STATUS => 'required|in:' . implode(',', Model::ALLOWED_MARITAL_STATUSES),
            Model::DB_COLUMN_BORN_PLACE => 'required|string|min:10',
            Model::DB_COLUMN_DEGREE => 'required|string|min:5',
            Model::DB_COLUMN_JOB => 'required|string|min:5',
            Model::DB_COLUMN_SEX_TYPE => 'required|in:' . implode(',', Model::ALLOWED_SEX_TYPES),
            Model::DB_COLUMN_ASSURANCE_TYPE => 'required|in:' . implode(',', Model::ALLOWED_ASSURANCE_TYPES),
            Model::DB_COLUMN_NSS => 'required|string|min:5',
        ];
    }
}

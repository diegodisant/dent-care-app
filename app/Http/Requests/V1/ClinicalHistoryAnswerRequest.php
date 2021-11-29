<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\ClinicalHistoryAnswer as Model;

class ClinicalHistoryAnswerRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            Model::DB_FIELD_FK_CLINICAL_HISTORY => 'required|numeric',
            Model::DB_FIELD_FK_CLINICAL_HISTORY_QUESTION => 'required|numeric',
            Model::DB_FIELD_ANSWER => 'required|string|min:0|max:250',
        ];
    }
}

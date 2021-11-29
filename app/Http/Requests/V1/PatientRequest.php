<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\Patient;

class PatientRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            Patient::DB_FIELD_FK_USER => 'required|numeric',
            Patient::DB_FIELD_NAME => 'required|string|min:5|max:150',
            Patient::DB_FIELD_PHONE_NUMBER => 'required|digits:10',
            Patient::DB_FIELD_BIRTH_DATE => 'required|date',
            Patient::DB_FIELD_ADDRESS => 'required|string|min:10|max:200',
        ];
    }
}

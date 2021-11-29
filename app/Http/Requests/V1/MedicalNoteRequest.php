<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\MedicalNote;

class MedicalNoteRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            MedicalNote::DB_FIELD_FK_APPOINTMENT => 'required|numeric',
            MedicalNote::DB_FIELD_APPLIED_TREATMENT => 'required|string|min:10',
            MedicalNote::DB_FIELD_ADDITIONAL_NOTES => 'required|string|min:10',
        ];
    }
}

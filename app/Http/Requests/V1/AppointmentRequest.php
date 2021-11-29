<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\Appointment;

class AppointmentRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            Appointment::DB_FIELD_FK_PATIENT => 'required|numeric',
            Appointment::DB_FIELD_APPOINTMENT_AT => 'required|date',
            Appointment::DB_FIELD_STATUS => 'required|in' . implode(',', Appointment::ALLOWED_STATUSES),
        ];
    }
}

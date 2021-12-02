<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Patient;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     */
    public function toArray($request): Arrayable | JsonSerializable | array
    {
        return [
            Patient::DB_FIELD_ID => $this->id,
            Patient::DB_FIELD_FK_USER => $this->fk_user,
            Patient::DB_FIELD_NAME => $this->name,
            Patient::DB_FIELD_PHONE_NUMBER => $this->phone_number,
            Patient::DB_FIELD_BIRTH_DATE => $this->birth_date,
            Patient::DB_FIELD_ADDRESS => $this->address,
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Models\User;
use JsonSerializable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Support\Arrayable;

class UserResource extends JsonResource
{
    public function toArray($request): Arrayable | JsonSerializable | array
    {
        return [
            User::DB_FIELD_ID => $this->id,
            User::DB_FIELD_NAME => $this->name,
            User::DB_FIELD_EMAIL => $this->email,
            User::DB_FIELD_USER_TYPE => $this->user_type,
        ];
    }
}

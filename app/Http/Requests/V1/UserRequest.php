<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use App\Models\User;

class UserRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            User::DB_FIELD_NAME => 'required|string',
            User::DB_FIELD_EMAIL => 'required|email',
            User::DB_FIELD_PASSWORD => 'required|string|min:5|max:12',
            User::USER_TYPE_ADMIN => 'nullable|string|in:' . implode(',', User::ALLOWED_USER_TYPES),
        ];
    }
}

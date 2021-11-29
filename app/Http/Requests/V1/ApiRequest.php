<?php
declare(strict_types=1);

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

abstract class ApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    abstract public function rules(): array;
}

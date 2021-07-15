<?php

namespace App\Http\Requests\SchoolClass;

use App\Http\Requests\BaseRequest;
use App\Models\SchoolClass;

class SchoolClassStoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("store", SchoolClass::class);
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|min:1"
        ];
    }
}

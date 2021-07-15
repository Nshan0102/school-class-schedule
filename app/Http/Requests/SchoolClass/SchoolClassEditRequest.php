<?php

namespace App\Http\Requests\SchoolClass;

use App\Http\Requests\BaseRequest;
use App\Models\SchoolClass;

class SchoolClassEditRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("school_class.edit", SchoolClass::class);
    }
}

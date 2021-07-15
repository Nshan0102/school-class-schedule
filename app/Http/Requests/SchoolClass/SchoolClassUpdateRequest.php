<?php

namespace App\Http\Requests\SchoolClass;

use App\Models\SchoolClass;

class SchoolClassUpdateRequest extends SchoolClassStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->access("school_class.update", SchoolClass::class);
    }
}

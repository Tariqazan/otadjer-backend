<?php

namespace Modules\Inventory\Http\Requests;

use App\Abstracts\Http\FormRequest as Request;

class Variant extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Get company id
        $company_id = $this->request->get('company_id');

        // Check if store or update
        if ($this->getMethod() == 'PATCH') {
            $id = $this->variant->getAttribute('id');
        } else {
            $id = null;
        }

        return [
            'name' => 'required|string',
            'enabled' => 'integer|boolean',
        ];
    }
}

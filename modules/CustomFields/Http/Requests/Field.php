<?php

namespace Modules\CustomFields\Http\Requests;

use App\Abstracts\Http\FormRequest;
use Modules\CustomFields\Models\Type;

class Field extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'icon' => 'required|string',
            'class' => 'required|string',
            'type_id' => 'required|integer',
            'location_id' => 'required|integer',
            'sort' => 'required|string',
            'enabled' => 'integer|boolean',
        ];

        $type = Type::find(request()->get('type_id'));

        if ($type->type == 'select' ||
            $type->type == 'checkbox'
        ) {
            $rules['items'] = 'required|array';
            $rules['items.*'] = 'required|array';
        }

        if (request('sort', true) != 'item_custom_fields') {
            $rules['order'] = 'required|string';
        }

        return $rules;
    }
}

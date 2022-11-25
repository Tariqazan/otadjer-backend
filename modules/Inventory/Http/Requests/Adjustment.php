<?php

namespace Modules\Inventory\Http\Requests;

use App\Abstracts\Http\FormRequest as Request;

class Adjustment extends Request
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
        return [
            'date'                          => 'required',
            'adjustment_number'             => 'required|string',
            'warehouse_id'                  => 'required|integer',
            'reason'                        => 'required|string',
            'items.*.item_id'               => 'required|integer',
            'items.*.item_quantity'         => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.adjusted_quantity'     => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
        ];
    }
}

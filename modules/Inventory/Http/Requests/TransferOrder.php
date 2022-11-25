<?php

namespace Modules\Inventory\Http\Requests;

use App\Abstracts\Http\FormRequest as Request;

class TransferOrder extends Request
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
            'date'                      => 'required',
            'transfer_order'            => 'required|string',
            'transfer_order_number'     => 'required|string',
            'source_warehouse_id'       => 'required|integer',
            'destination_warehouse_id'  => 'required|integer',
            'items.*.item_id'           => 'required|integer',
            'items.*.item_quantity'     => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.transfer_quantity' => 'required|integer'
        ];
    }
}

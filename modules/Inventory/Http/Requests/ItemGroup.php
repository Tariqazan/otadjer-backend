<?php

namespace Modules\Inventory\Http\Requests;

use App\Abstracts\Http\FormRequest as Request;

class ItemGroup extends Request
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
            $sku = 'required|string';
        } else {
            $sku = 'required|string|unique:inventory_items,NULL,,item_id,company_id,' . $company_id . ',deleted_at,NULL';
        }

        $picture = $inventory_tab = $price_tab = $barcode = 'nullable';

        if ($this->files->get('picture', null)) {
            $picture = 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024;
        }

        $items = $this->request->get('items');

        if ($items) {
            foreach ($items as $item) {
                if (!isset($item['name']) || !isset($item['opening_stock']) || empty($item['warehouse_id'])) {
                    $inventory_tab = 'required';
                }

                if (!isset($item['name']) || !isset($item['sku']) || !isset($item['sale_price']) || !isset($item['purchase_price'])) {
                    $price_tab = 'required';
                }
            }
        } else {
            $inventory_tab = 'required';
            $price_tab = 'required';
        }

        if (setting('inventory.barcode_type') == 2) {
            $barcode = 'nullable|min:12|max:12';
        }

        return [
            'name' => 'required|string',
            'variants.*.variant_id' => 'required',
            'enabled' => 'integer|boolean',
            'unit' => 'required|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string',
            'items.*.sku' => $sku,
            'items.*.sale_price' => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.purchase_price' => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.opening_stock' => 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.reorder_level' => 'nullable|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.warehouse_id' => 'required|integer',
            'items.*.barcode' => $barcode,
            'picture' => $picture,
            'inventory_tab' => $inventory_tab,
            'price_tab' => $price_tab,
        ];
    }

    public function messages()
    {
        return [
            'variants.*.variant_id.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('general.name'))]),
            'inventory_tab.required' => trans('inventory::general.required_fields', ['attribute' => mb_strtolower(trans('inventory::general.name'))]),
            'price_tab.required' => trans('inventory::general.required_fields', ['attribute' => mb_strtolower(trans('inventory::items.price'))]),
            'items.*.name.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('general.name'))]),
            'items.*.sku.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('inventory::general.sku'))]),
            'items.*.sale_price.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('items.sales_price'))]),
            'items.*.purchase_price.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('items.purchase_price'))]),
            'items.*.opening_stock.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('inventory::general.stock'))]),
            'items.*.warehouse_id.required' => trans('validation.required', ['attribute' => mb_strtolower(trans_choice('inventory::general.warehouses', 1))]),
            'items.*.barcode.min' => trans('validation.min.numeric', ['attribute' => mb_strtolower(trans('inventory::general.barcode')), 'min' => '12']),
            'items.*.barcode.max' => trans('validation.min.numeric', ['attribute' => mb_strtolower(trans('inventory::general.barcode')), 'max' => '12']),
        ];
    }
}

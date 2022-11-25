<?php

namespace Modules\Inventory\Http\Requests;

use App\Abstracts\Http\FormRequest as Request;

class Item extends Request
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
        $company_id = $this->request->get('company_id');

        // Check if store or update
        if ($this->getMethod() == 'PATCH') {
            $id = $this->item->getAttribute('id');
        } else {
            $id = null;
        }

        if (!empty($this->request->get('sku'))) {
            $sku_unique = 'unique:inventory_items,NULL,' . $id . ',item_id,company_id,' . $company_id . ',deleted_at,NULL';
        }

        $picture = $item = $group = $group_sku = $unit = $barcode ='nullable';

        if ($this->files->get('picture', null)) {
            $picture = 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024;
        }

        $price = 'required|regex:/^(?=.*?[0-9])[0-9.,]+$/';

        $sku = 'nullable|string';

        if ($this->request->has('track_inventory') == true && $this->request->get('track_inventory') == true) {
            if ($this->request->has('add_variants') == true && $this->request->get('add_variants') == 'true') {
                $item = $sku = $price = 'nullable';
                $group = 'required';
                $group_sku = 'required|string|unique:inventory_items,NULL,,item_id,company_id,' . $company_id . ',deleted_at,NULL';
            } else {
                $sku = 'required|string';
                $item = 'required';
            }
            $unit = 'required|string';
        }

        if (isset($sku_unique)) {
            $sku = $sku . '|' . $sku_unique;
        }

        $inventory_tab = 'nullable';
        $price_tab = 'nullable';

        if ($group == 'required') {
            $group_items = $this->request->get('group_items');

            if ($group_items) {
                foreach ($group_items as $group_item) {
                    if (!isset($group_item['name']) || !isset($group_item['opening_stock']) || empty($group_item['warehouse_id'])) {
                        $inventory_tab = 'required';
                    }

                    if (!isset($group_item['name']) || !isset($group_item['sku']) ||
                        !isset($group_item['sale_price']) || !isset($group_item['purchase_price'])) {
                        $price_tab = 'required';
                    }
                }
            } else {
                $inventory_tab = 'required';
                $price_tab = 'required';
            }
        }

        if (setting('inventory.barcode_type') == 2) {
            $barcode = 'nullable|min:12|max:12';
        }

        return [
            'name' => 'required|string',
            'sku' => $sku,
            'sale_price' => $price,
            'purchase_price' => $price,
            'unit' => $unit,
            'barcode' => $barcode,
            'tax_ids' => 'nullable|array',
            'category_id' => 'nullable|integer',
            'enabled' => 'integer|boolean',
            'group_items.*.name' => $group . '|string',
            'group_items.*.sku' => $group_sku,
            'group_items.*.sale_price' => $group . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'group_items.*.purchase_price' => $group . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'group_items.*.opening_stock' => $group . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'group_items.*.reorder_level' => $group . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'group_items.*.warehouse_id' => $group . '|integer',
            'group_items.*.barcode' => $barcode,
            'items.*.opening_stock' => $item . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.reorder_level' => $item . '|regex:/^(?=.*?[0-9])[0-9.,]+$/',
            'items.*.warehouse_id' => $item . '|integer',
            'picture' => $picture,
            'inventory_tab' => $inventory_tab,
            'price_tab' => $price_tab,
        ];
    }

    public function messages()
    {

        // max = The barcode must not be greater than 12 characters.
        // min = The barcode must be at least 12 characters.
        return [
            'inventory_tab.required' => trans('inventory::general.required_fields', ['attribute' => mb_strtolower(trans('inventory::general.name'))]),
            'price_tab.required' => trans('inventory::general.required_fields', ['attribute' => mb_strtolower(trans('inventory::items.price'))]),
            'items.*.opening_stock.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('inventory::general.stock'))]),
            'items.*.warehouse_id.required' => trans('validation.required', ['attribute' => mb_strtolower(trans_choice('inventory::general.warehouses', 1))]),
            'group_items.*.name.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('general.name'))]),
            'group_items.*.sku.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('inventory::general.sku'))]),
            'group_items.*.sale_price.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('items.sales_price'))]),
            'group_items.*.purchase_price.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('items.purchase_price'))]),
            'group_items.*.opening_stock.required' => trans('validation.required', ['attribute' => mb_strtolower(trans('inventory::general.stock'))]),
            'group_items.*.warehouse_id.required' => trans('validation.required', ['attribute' => mb_strtolower(trans_choice('inventory::general.warehouses', 1))]),
            'group_items.*.barcode.min' => trans('validation.min.numeric', ['attribute' => mb_strtolower(trans('inventory::general.barcode')), 'min' => '12']),
            'group_items.*.barcode.max' => trans('validation.min.numeric', ['attribute' => mb_strtolower(trans('inventory::general.barcode')), 'max' => '12']),
        ];
    }
}

<tr class="row" v-for="(row, index) in form.items" :index="index">
    @stack('name_td_start')
        <td class="col-md-3 action-column border-right-0">
            @stack('name_input_start')
                <div>
                    <input type="text"
                    class="form-control"
                    :name="'items.' + index + '.name'"
                    autocomplete="off"
                    required="required"
                    data-item="name"
                    v-model="row.name"
                    @change="form.errors.clear('items.' + index + '.name')">

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('items.' + index + '.name')"
                        v-html="form.errors.get('items.' + index + '.name')">
                    </div>
                </div>

                <input class="form-control"
                    data-item="variant_value_id"
                    required="required"
                    name="items[][variant_value_id]"
                    v-model="row.variant_value_id"
                    type="hidden"
                    autocomplete="off">
            @stack('name_input_end')
        </td>
    @stack('name_td_end')

    @stack('sku_td_start')
        <td class="col-md-1 action-column border-right-0">
            @stack('sku_input_start')
                <div>
                    <input type="text"
                    class="form-control"
                    :name="'items.' + index + '.sku'"
                    autocomplete="off"
                    required="required"
                    data-item="sku"
                    v-model="row.sku"
                    @change="form.errors.clear('items.' + index + '.sku')">

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('items.' + index + '.sku')"
                        v-html="form.errors.get('items.' + index + '.sku')">
                    </div>
                </div>
            @stack('sku_input_end')
        </td>
    @stack('sku_td_end')

    @stack('sale_price_td_start')
        <td class="col-md-2 action-column border-right-0">
            @stack('sale_price_input_start')
                <div>
                    <input type="text"
                    class="form-control"
                    :name="'items.' + index + '.sale_price'"
                    autocomplete="off"
                    required="required"
                    data-item="sale_price"
                    v-model="row.sale_price"
                    @change="form.errors.clear('items.' + index + '.sale_price')">

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('items.' + index + '.sale_price')"
                        v-html="form.errors.get('items.' + index + '.sale_price')">
                    </div>
                </div>
            @stack('sale_price_input_end')
        </td>
    @stack('sale_price_td_end')

    @stack('purchase_price_td_start')
        <td class="col-md-2 action-column border-right-0">
            @stack('purchase_price_input_start')
                <div>
                    <input type="text"
                    class="form-control"
                    :name="'items.' + index + '.purchase_price'"
                    autocomplete="off"
                    required="required"
                    data-item="purchase_price"
                    v-model="row.purchase_price"
                    @change="form.errors.clear('items.' + index + '.purchase_price')">

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('items.' + index + '.purchase_price')"
                        v-html="form.errors.get('items.' + index + '.purchase_price')">
                    </div>
                </div>
            @stack('purchase_price_input_end')
        </td>
    @stack('purchase_price_td_end')

    @stack('opening_stock_td_start')
        <td class="col-md-2 action-column border-right-0">
            @stack('opening_stock_input_start')
                <div>
                    <input type="text"
                    class="form-control"
                    :name="'items.' + index + '.opening_stock'"
                    autocomplete="off"
                    required="required"
                    data-item="opening_stock"
                    v-model="row.opening_stock"
                    @change="form.errors.clear('items.' + index + '.opening_stock')">

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('items.' + index + '.opening_stock')"
                        v-html="form.errors.get('items.' + index + '.opening_stock')">
                    </div>
                </div>
            @stack('opening_stock_input_end')
        </td>
    @stack('opening_stock_td_end')

    @stack('reorder_level_td_start')
        <td class="col-md-2 action-column">
            @stack('reorder_level_input_start')
                <input class="form-control"
                    data-item="reorder_level"
                    required="required"
                    name="items[][reorder_level]"
                    v-model="row.reorder_level"
                    type="text"
                    autocomplete="off">
            @stack('reorder_level_input_end')
        </td>
    @stack('reorder_level_td_end')
</tr>

{!! Form::label('items', trans_choice('general.items', 2), ['class' => 'control-label']) !!}

<label class="text-danger">*</label>

<div class="table-responsive">
    <table class="table table-bordered" id="items">
        <thead class="thead-light">
            <tr class="row">
                <th class="col-md-3 action-column border-right-0">
                    {{ trans('general.name') }}
                    <label class="text-danger">*</label>
                </th>

                <th class="col-md-3 action-column border-right-0">
                    {{ trans('inventory::general.sku') }}
                    <label class="text-danger">*</label>
                </th>

                <th class="col-md-2 action-column border-right-0">
                    {{ trans('inventory::general.barcode') }}
                </th>

                <th class="col-md-2 action-column border-right-0">
                    {{ trans('items.sales_price') }}
                    <label class="text-danger">*</label>
                </th>

                <th class="col-md-2 action-column border-right-0">
                    {{ trans('items.purchase_price') }}
                    <label class="text-danger">*</label>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr class="row" v-for="(group_row, group_index) in form.group_items">
                <td class="col-md-3 action-column border-right-0">
                    <div>
                        <input type="text"
                        class="form-control"
                        :name="'group_items.' + group_index + '.name'"
                        autocomplete="off"
                        required="required"
                        data-item="name"
                        v-model="group_row.name"
                        @change="form.errors.clear('group_items.' + group_index + '.name')">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.name')"
                            v-html="form.errors.get('group_items.' + group_index + '.name')">
                        </div>
                    </div>

                    <input class="form-control"
                        data-item="variant_value_id"
                        required="required"
                        name="group_items[][variant_value_id]"
                        v-model="group_row.variant_value_id"
                        type="hidden"
                        autocomplete="off">
                </td>

                <td class="col-md-3 action-column border-right-0">
                    <div>
                        <input type="text"
                        class="form-control"
                        :name="'group_items.' + group_index + '.sku'"
                        autocomplete="off"
                        required="required"
                        data-item="sku"
                        v-model="group_row.sku"
                        @change="form.errors.clear('group_items.' + group_index + '.sku')">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.sku')"
                            v-html="form.errors.get('group_items.' + group_index + '.sku')">
                        </div>
                    </div>
                </td>

                <td class="col-md-2 action-column">
                    <div>
                        <input class="form-control"
                        data-item="barcode"
                        :name="'group_items.' + group_index + '.barcode'"
                        v-model="group_row.barcode"
                        type="text"
                        autocomplete="off">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.barcode')"
                            v-html="form.errors.get('group_items.' + group_index + '.barcode')">
                        </div>
                    </div>
                </td>

                <td class="col-md-2 action-column border-right-0">
                    <div>
                        <input type="text"
                        class="form-control"
                        :name="'group_items.' + group_index + '.sale_price'"
                        autocomplete="off"
                        required="required"
                        data-item="sale_price"
                        v-model="group_row.sale_price"
                        @change="form.errors.clear('group_items.' + group_index + '.sale_price')">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.sale_price')"
                            v-html="form.errors.get('group_items.' + group_index + '.sale_price')">
                        </div>
                    </div>
                </td>

                <td class="col-md-2 action-column border-right-0">
                    <div>
                        <input type="text"
                        class="form-control"
                        :name="'group_items.' + group_index + '.purchase_price'"
                        autocomplete="off"
                        required="required"
                        data-item="purchase_price"
                        v-model="group_row.purchase_price"
                        @change="form.errors.clear('group_items.' + group_index + '.purchase_price')">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.purchase_price')"
                            v-html="form.errors.get('group_items.' + group_index + '.purchase_price')">
                        </div>
                    </div>
                </td>
            </tr>
            {{-- @include('inventory::item-groups.item') --}}
        </tbody>
    </table>
</div>

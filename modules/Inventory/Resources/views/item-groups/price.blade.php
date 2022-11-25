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
            <tr class="row" v-for="(row, index) in form.items" :index="index">
                <td class="col-md-3 action-column border-right-0">
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
                </td>

                <td class="col-md-3 action-column border-right-0">
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
                </td>

                <td class="col-md-2 action-column">
                    <div>
                        <input class="form-control"
                        data-item="barcode"
                        :name="'items.' + index + '.barcode'"
                        v-model="row.barcode"
                        type="text"
                        autocomplete="off">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('items.' + index + '.barcode')"
                            v-html="form.errors.get('items.' + index + '.barcode')">
                        </div>
                    </div>
                </td>

                <td class="col-md-2 action-column border-right-0">
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
                </td>

                <td class="col-md-2 action-column border-right-0">
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
                </td>
            </tr>
            {{-- @include('inventory::item-groups.item') --}}
        </tbody>
    </table>
</div>

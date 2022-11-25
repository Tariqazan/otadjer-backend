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
                    {{ trans_choice('inventory::general.warehouses', 1) }}
                    <label class="text-danger">*</label>
                </th>

                <th class="col-md-3 action-column border-right-0">
                    {{ trans('inventory::general.stock') }}
                    <label class="text-danger">*</label>
                </th>

                <th class="col-md-3 action-column border-right-0">
                    {{ trans('inventory::items.reorder_level') }}
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
                        <akaunting-select
                            class="form-control-sm d-inline-block col-md-12"
                            :placeholder="'{{ trans('general.form.select.field', ['field' => trans_choice('inventory::general.warehouses', 1)])  }}'"
                            :name="'group_items.' + group_index + '.warehouse_id'"
                            :icon="'fas fa-warehouse'"
                            :options="{{ json_encode($warehouses) }}"
                            :value="'{{ setting('inventory.default_warehouse') }}'"
                            @interface="group_row.warehouse_id = $event"
                        >
                        </akaunting-select>
                    </div>
                </td>

                <td class="col-md-3 action-column border-right-0">
                    <div>
                        <input type="text"
                        class="form-control"
                        :name="'group_items.' + group_index + '.opening_stock'"
                        autocomplete="off"
                        required="required"
                        data-item="opening_stock"
                        v-model="group_row.opening_stock"
                        @change="form.errors.clear('group_items.' + group_index + '.opening_stock')">

                        <div class="invalid-feedback d-block"
                            v-if="form.errors.has('group_items.' + group_index + '.opening_stock')"
                            v-html="form.errors.get('group_items.' + group_index + '.opening_stock')">
                        </div>
                    </div>
                </td>

                <td class="col-md-3 action-column">
                    <input class="form-control"
                        data-item="reorder_level"
                        name="group_items[][reorder_level]"
                        v-model="group_row.reorder_level"
                        type="text"
                        autocomplete="off">
                </td>
            </tr>
        </tbody>
    </table>
</div>

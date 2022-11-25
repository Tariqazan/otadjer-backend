<div class="table-responsive">
    <table class="table table-bordered" id="items">
        <thead class="thead-light">
            <tr class="row">
                <th class="col-md-1">{{ trans('general.actions') }}</th>
                <th class="col-md-4">{{ trans_choice('general.items', 1) }}</th>
                <th class="col-md-4">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                <th class="col-md-3">{{ trans('composite-items::general.quantity') }}</th>
            </tr>
        </thead>

        <tbody>
            <tr class="row" v-for="(row, index) in form.items">
                <td class="col-md-1">
                    <button type="button"
                        @click="onDeleteItem(index)"
                        data-toggle="tooltip"
                        title="{{ trans('general.delete') }}"
                        class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
                    </button>
                </td>
                <td class="col-md-4">
                    <akaunting-select
                        :form-classes="[{'has-error': form.errors.get('item_id') }]"
                        :icon="'fa fa-cube'"
                        :placeholder="'{{ trans('general.form.select.field',
                        ['field' => trans_choice('general.items', 1)]) }}'"
                        :name="'items.' + index + '.item_id'"
                        :options="{{ $items }}"
                        :value="row.item_id"
                        @interface="row.item_id = $event"
                        {{-- @change="onSelectItem(index)" --}}
                        :form-error="form.errors.get('item_id')"
                        :no-data-text="'{{ trans('general.no_data') }}'"
                        :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                        >
                    </akaunting-select>
                </td>
                <td class="col-md-4">
                    <akaunting-select
                        :form-classes="[{'has-error': form.errors.get('warehouse_id') }]"
                        :icon="'warehouse'"
                        :placeholder="'{{ trans('general.form.select.field', 
                        ['field' => trans_choice('inventory::general.warehouses', 1)])  }}'"
                        :name="'items.' + index + '.warehouse_id'"
                        @if (! empty($warehouses))
                        :options="{{ $warehouses }}"
                        @endif
                        :dynamic-options="warehouses[index]"
                        :data-item ='row.warehouse_id'
                        :v-model = 'row.warehouse_id'
                        :value="row.warehouse_id"
                        @interface="row.warehouse_id = $event"
                        :form-error="form.errors.get('warehouse_id')"
                        :no-data-text="'{{ trans('general.no_data') }}'"
                        :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                    ></akaunting-select>
                </td>
                <td class="col-md-3">
                    <input value=""
                    class="form-control"
                    data-item="quantity"
                    required="required"
                    name="items[][quantity]"
                    v-model="row.quantity"
                    type="text"
                    autocomplete="off">
                </td>
            </tr>

            <tr id="addItem">
                <td class="col-md-1">
                    <button type="button"
                        @click="onAddItem"
                        id="button-add-item"
                        data-toggle="tooltip"
                        title="{{ trans('general.add') }}"
                        class="btn btn-icon btn-outline-success btn-lg"
                        data-original-title="{{ trans('general.add') }}">
                        <i class="fa fa-plus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

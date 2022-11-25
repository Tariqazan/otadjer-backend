<div class="table-responsive">
    <table class="table table-bordered" id="items">
        <thead class="thead-light">
            <tr class="row">
                <th class="col-md-1">{{ trans('general.actions') }}</th>
                <th class="col-md-5">
                    {{ trans_choice('inventory::general.warehouses', 1) }}
                    <label class="text-danger">*</label>
                </th>
                <th class="col-md-3">
                    {{ trans('inventory::items.opening_stock') }}
                    <label class="text-danger">*</label>
                </th>
                <th class="col-md-3">{{ trans('inventory::items.reorder_level') }}</th>
            </tr>
        </thead>

        <tbody>
            <tr class="row" v-for="(row, index) in form.items" :index="index">
                <td class="col-md-1">
                    <button type="button"
                        @click="onDeleteItem(index)"
                        data-toggle="tooltip"
                        title="{{ trans('general.delete') }}"
                        class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
                    </button>
                </td>
                <td class="col-md-5">
                    <div class="row">
                        <div class="custom-radio col-md-2 p-3">
                            <input type="radio"
                                name="items[][default_warehouse]"
                                :id="'default-warehouse-' + index"
                                data-item="default_warehouse"
                                :value="'true'"
                                @change="onChangeDefault(index)"
                                v-model="row.default_warehouse"
                                class="custom-control-input">
                            <label :for="'default-warehouse-' + index" class="custom-control-label">
                                {{ trans('inventory::general.default') }}
                            </label>
                        </div>

                        <akaunting-select
                            class="form-control-sm d-inline-block col-md-10"
                            :placeholder="'{{ trans('general.form.select.field', ['field' => trans_choice('inventory::general.warehouses', 1)])  }}'"
                            :name="'items.' + index + '.warehouse_id'"
                            :icon="'fas fa-warehouse'"
                            :options="{{ json_encode($warehouses) }}"
                            :value="'{{ setting('inventory.default_warehouse') }}'"
                            @interface="row.warehouse_id = $event"
                        >
                        </akaunting-select>
                    </div>
                </td>
                <td class="col-md-3">
                    <input value=""
                    class="form-control"
                    data-item="opening_stock"
                    required="required"
                    name="items[][opening_stock]"
                    v-model="row.opening_stock"
                    type="text"
                    autocomplete="off">
                </td>
                <td class="col-md-3">
                    <input value=""
                    class="form-control"
                    data-item="reorder_level"
                    required="required"
                    name="items[][reorder_level]"
                    v-model="row.reorder_level"
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
